<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

        ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/_s/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/_s/style.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container">
        <div id="navigation" class="row clearfix">
            <div class="span8" id="header">
                <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
                <ul id="links">
                    <!-- navigation links -->
                    <?php 
                        $bookmarks_args = array(
                            'limit' => -1, 
                            'category' => 3, 
                            );
                        $bookmarks = get_bookmarks($bookmarks_args);
                        foreach ($bookmarks as $bookmark) {
                            $bookmark_repr = '<li class="link"><a href="' . $bookmark->link_url . '">' . $bookmark->link_name . '</a></li>';
                            echo($bookmark_repr);
                        }
                        //wp_list_bookmarks(3, '<li class="nav-link link">', '</li>', '', TRUE, 'rating', TRUE); 
                    ?>
                    <!-- social links -->
                    <!--<?php //get_links(4, '<li class="social-link link hidden-phone">', '</li>', '', TRUE, 'url', TRUE); ?>-->
                </ul>
            </div><!--.span8-->
            <div class="span4">
                <p class="contact-info visible-desktop">
                    <span>(202) 506-4215</span><br>
                    <a href="mailto:tom@ansoniawines.com">tom@ansoniawines.com<br>
                    <a href="https://www.twitter.com/ansoniawines">@ansoniawines</a><br>
                    <a href="/follow/" class="subscribe-link">Sign up for our posts</a>
                </p>
            </div><!--.span4-->
        </div><!-- #navigation.row -->

        <hr />

        <div id="content">