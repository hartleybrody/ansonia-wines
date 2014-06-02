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
                <a href="<?php echo get_site_url(); ?>">
                    <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
                </a>
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
                    <input type="submit" name="go" value="GO" class="submit" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -4px; height:30px">
                    <input type="hidden" name="m" value="1102867877524">
                    <input type="hidden" name="p" value="oi">
                </form>
                <!-- end constant contact form -->


            </div>
        </div><!-- #header.row -->

        <hr />

        <!-- header slideshow, only shown on homepage -->
        <div class="row" id="main-slideshow" <?php if (!is_home()){ echo('style="display:none"');} ?>>
            <div class="span12">
                <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <a href="http://www.ansoniawines.com/about">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/slideshow/about_slide2.jpg" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/2014/05/delightful-exuberant-pinot-noir/">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/slideshow/pn13_slide.jpg" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/newton">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/slideshow/panorama_slide.jpg" />
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/regional-samplers/">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/slideshow/samplers_slide.jpg" />
                            </a>
                        </div>

                        <!-- SAMPLE SLIDESHOW ITEM TO COPY
                        <div class="item">
                            <a href="{{link_goes_here}}">
                                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/slideshow/{{file_name_goes_here}}.jpg" />
                            </a>
                        </div>
                        END SAMPLE ITEM -->
                    </div>

                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>

        <div class="modal fade hide" style="height:500px; width:1000px;" >
            <div class="row">
                <div class="span6">
                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/pop-up-tiles.jpg" style="height:500px; max-width:500px;"/>
                </div>
                <div class="span6" style="padding-top: 80px; padding-left: 50px">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -70px; margin-right: 10px;">&times;</button>
                    <h1 id="site-title">
                        Ansonia Wines
                    </h1>
                    <h2 id="site-byline">
                        Artisan French wines<br>from winemakers we know.
                    </h2>

                    <hr />

                    <span id="call-to-action">
                        Join our email list:
                    </span><br>
                    <!-- constant contact form -->
                    <form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style="display: inline;">
                        <input type="text" name="ea" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10px; border:1px solid #CCCCCC; width:150px" class="input-large input" placeholder="Email Address...">
                        <input type="submit" name="go" value="GO" class="submit" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -4px; height:30px">
                        <input type="hidden" name="m" value="1102867877524">
                        <input type="hidden" name="p" value="oi">
                    </form>
                    <!-- end constant contact form -->

                    <hr />

                    <p style="width:95%">
                        Each week we write a series of posts about our wines, sharing tasting notes, maps, stories, and recipe pairings. Sign up to receive these posts by email, and follow us across France as we bring you interesting wines that reflect the place from which they come.
                    </p>
                </div>
            </div>
        </div>

        <div id="content">