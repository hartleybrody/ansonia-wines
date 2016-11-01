<?php

    error_reporting(E_ALL & ~E_NOTICE);

    if (!$_POST['name'] || !$_POST['zip']){
        header("Location: http://www.ansoniawines.com/join/?email=" . $_POST['email']);
        exit();
    }

    include $_SERVER["DOCUMENT_ROOT"] . '/wp-content/themes/_s/config.inc';

    $API_ROOT = "https://us10.api.mailchimp.com/3.0";
    $BASIC_AUTH = "hartley:" . $MC_API_KEY; // note that the 'user' before the colon can be any string
    $AUTH_TOKEN = "Basic " . base64_encode($BASIC_AUTH);

    $LIST_ID = "c9624d5296";
    $endpoint = $API_ROOT . "/lists/" . $LIST_ID . "/members";

    date_default_timezone_set('UTC');
    $now = date('Y-m-d H:i:s');

    $postData = array(
        'email_address' => $_POST['email'],
        'status' => 'subscribed',
        'merge_fields' => array(
            'FNAME' => $_POST['name'],
            'MMERGE3' => $_POST['zip']  // zipcode
        ),

        'ip_signup' => $_SERVER['REMOTE_ADDR'],
        'timestamp_signup' => $now,
        'ip_opt' => $_SERVER['REMOTE_ADDR'],
        'timestamp_opt' => $now,
    );

    // echo(json_encode($postData));

    $ch = curl_init($endpoint);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization: '. $AUTH_TOKEN,
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    // Send the request
    $response = curl_exec($ch);

    // Check for errors
    if($response === FALSE){
        die(curl_error($ch));
    }

    // Decode the response
    $responseData = json_decode($response, TRUE);
    // print_r($responseData);

    // echo "Thanks for subscribing!";
    header("Location: http://www.ansoniawines.com/confirm/");
    exit();

?>