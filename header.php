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
    
    <link rel="stylesheet" href="wp-content/themes/_s/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="wp-content/themes/_s/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="wp-content/themes/_s/css/ansonia-wines.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container">
        <div id="navigation" class="clearfix">
			<ul id="links">
                <!-- navigation links -->
                <?php get_links(3, '<li class="nav-link link">', '</li>', '', TRUE, 'url', TRUE); ?>
                <!-- social links -->
                <?php get_links(4, '<li class="social-link link">', '</li>', '', TRUE, 'url', TRUE); ?>
			</ul>
		</div><!-- #navigation -->
        
        <div class="row clearfix">
            <div class="span12" id="logo-banner">
                <a href="<?php echo home_url(); ?>">
                    <img src="/wp-content/themes/_s/img/logo.jpg" />
                </a>
            </div>
        </div>

        <div id="content">