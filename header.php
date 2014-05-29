<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon1.ico" />
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
        <div id="header" class="row clearfix">
            <div class="span6">
                <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
            </div>
            <div class="span6">
                <ul id="links">
                    <!-- navigation links -->
                    <?php 
                        $bookmarks_args = array(
                            'limit' => -1, 
                            'category' => 3, 
                            );
                        $bookmarks = get_bookmarks($bookmarks_args);

                        // sort the order of the links by their rating
                        function sort_by_rating($a, $b){
                            if ($a->link_rating == $b->link_rating) {
                                return 0;
                            }
                            return ($a->link_rating < $b->link_rating) ? -1 : 1;
                        }
                        usort($bookmarks, "sort_by_rating");
                        
                        foreach ($bookmarks as $bookmark) {
                            $bookmark_repr = '<li class="link"><a href="' . $bookmark->link_url . '">' . $bookmark->link_name . '</a></li>';
                            echo($bookmark_repr);
                        }
                    ?>
                </ul>

                <br>
                <span id="call-to-action">
                    Join our email list:
                </span>
                <!-- constant contact form -->
                <form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style="display: inline;">
                    <input type="text" name="ea" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10px; border:1px solid #CCCCCC; width:150px" class="input-large input" placeholder="Email Address...">
                    <input type="submit" name="go" value="GO" class="submit" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -7px;">
                    <input type="hidden" name="m" value="1102867877524">
                    <input type="hidden" name="p" value="oi">
                </form>
                <!-- end constant contact form -->


            </div>
        </div><!-- #header.row -->

        <hr />

        <!-- top slideshow, only shown on homepage -->
        <div class="row" id="main-slideshow" <?php if (!is_home()){ echo('style="display:none"');} ?>>
            <div class="span12">
                <img src="http://placehold.it/940x200" />
            </div>
        </div>

        <div id="content">