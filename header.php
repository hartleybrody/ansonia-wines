<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />
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
    
    <meta name='viewport' content='content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0' />
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/_s/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/_s/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/_s/style.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container">
        <div id="header" class="row clearfix visible-desktop">
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

                <div style="float:right; opacity: 0.6; position: relative; top: 5px;">
                    <a href="http://instagram.com/AnsoniaWines" target="_blank">
                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/instagram.png" class="social-icon" />
                    </a>
                    <a href="https://www.facebook.com/AnsoniaWines" target="_blank">
                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/facebook.png" class="social-icon" />
                    </a>
                    <br>
                    <a href="https://twitter.com/ansoniawines" target="_blank">
                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/twitter.png" class="social-icon" />
                    </a>
                    <a href="https://www.pinterest.com/ansoniawines/" target="_blank">
                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/pinterest.png" class="social-icon" />
                    </a>
                </div>

                <br>
                <span id="call-to-action">
                    Join our list:
                </span>
                <!-- constant contact form -->
                <!-- <form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style="display: inline;">
                    <input type="text" name="ea" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10px; border:1px solid #CCCCCC; width:170px" class="input-large input" placeholder="Email Address...">
                    <input type="submit" name="go" value="GO" class="submit" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -4px; height:30px">
                    <input type="hidden" name="m" value="1102867877524">
                    <input type="hidden" name="p" value="oi">
                </form> -->
                <!-- end constant contact form -->

                <!-- Begin MailChimp Signup Form -->
                <form action="//ansoniawines.us10.list-manage.com/subscribe/post?u=ecdc119b3e0f9307376bd0bb7&amp;id=c9624d5296" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate style="display: inline;">
                    <input type="email" value="" name="EMAIL" class="required email input-large input" id="mce-EMAIL" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:10px; border:1px solid #CCCCCC; width:170px" placeholder="Email Address...">
                    <div style="position: absolute; left: -5000px;">
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <input type="text" name="b_ecdc119b3e0f9307376bd0bb7_c9624d5296" tabindex="-1" value="">
                    </div>
                    <input type="submit" value="GO" name="subscribe" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -4px; height:30px">
                </form>
                <!--End mc_embed_signup-->


            </div>
        </div><!-- #header.row -->

        <div class="navbar hidden-desktop">
            <div class="navbar-inner">
                <div class="container">
         
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
         
                    <!-- Be sure to leave the brand out there if you want it shown -->
                    <a class="brand" href="/">Ansonia Wines</a>
         
                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->
                        <ul id="mobile-links">
                            <!-- navigation links -->
                            <?php 
                                $bookmarks_args = array(
                                    'limit' => -1, 
                                    'category' => 3, 
                                    );
                                $bookmarks = get_bookmarks($bookmarks_args);

                                // sort the order of the links by their rating
                                // function sort_by_rating($a, $b){
                                //     if ($a->link_rating == $b->link_rating) {
                                //         return 0;
                                //     }
                                //     return ($a->link_rating < $b->link_rating) ? -1 : 1;
                                // }
                                usort($bookmarks, "sort_by_rating");
                                
                                foreach ($bookmarks as $bookmark) {
                                    $bookmark_repr = '<li class="link"><a href="' . $bookmark->link_url . '">' . $bookmark->link_name . '</a></li>';
                                    echo($bookmark_repr);
                                }
                            ?>
                            <li>
                                <hr />
                            </li>
                            <li class="link email-cta">
                                <a target="_blank" href="http://visitor.r20.constantcontact.com/d.jsp?llr=uutyaedab&p=oi&m=1102867877524&sit=kyqzuxveb&f=4d0c5e44-19e7-4cbd-9f6f-32dfc8bc93ff">
                                    Join Our List
                                </a>
                            </li>
                            <li>
                                <hr />
                            </li>
                            <li class="link">
                                <div style="opacity: 0.6;">
                                    <a href="instagram://user?username=ansoniawines" target="_blank">
                                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/instagram.png" class="social-icon" />
                                    </a>
                                    <a href="https://www.facebook.com/ansoniawines" target="_blank">
                                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/facebook.png" class="social-icon" />
                                    </a>
                                    <a href="twitter://user?screen_name=ansoniawines" target="_blank">
                                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/twitter.png" class="social-icon" />
                                    </a>
                                    <a href="https://www.pinterest.com/ansoniawines/" target="_blank">
                                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/icons/pinterest.png" class="social-icon" />
                                    </a>
                                </div>
                            </li>
                            <hr />
                        </ul>
                    </div>
         
                </div>
            </div>
        </div>

        <hr class="visible-desktop" />

        <?php if ( is_home() ) : ?>
        <!-- header slideshow, only shown on homepage -->
        <div class="row visible-desktop" id="main-slideshow">
            <div class="span12">
                <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item">
                            <a href="http://www.ansoniawines.com/tag/saturday-recipe">
                                <img src="http://www.ansoniawines.com/wp-content/uploads/2015/03/lobster_banner.jpg">
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/about/">
                                <img src="http://www.ansoniawines.com/wp-content/themes/_s/img/slideshow/about_slide2.jpg">
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/ordering/">
                                <img src="http://www.ansoniawines.com/wp-content/uploads/2014/10/ordering_banner_slide.jpg">
                            </a>
                        </div>
                        <div class="item active">
                            <a href="http://www.ansoniawines.com/futures/">
                                <img src="http://www.ansoniawines.com/wp-content/uploads/2015/04/april_banner.jpg">
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/newton">
                                <img src="http://www.ansoniawines.com/wp-content/themes/_s/img/slideshow/panorama_slide.jpg">
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ansoniawines.com/2015/04/spring-mix-six-pack-99/">
                                <img src="http://www.ansoniawines.com/wp-content/uploads/2015/04/spring_banner.jpg">
                            </a>
                        </div>
                        <!-- SAMPLE SLIDESHOW ITEM TO COPY
                        <div class="item">
                            <a href="{{link_goes_here}}">
                                <img src="http://www.ansoniawines.com/wp-content/themes/_s/img/slideshow/{{file_name_goes_here}}.jpg" />
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
        <?php endif; ?>

        <div class="modal fade hide" style="height:325px; width:850px;" >
            <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/pop-up-tiles.jpg" style="height:325px; max-width:300px; float:left"/>

            <div style="padding-top: 20px; padding-left: 350px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -15px; margin-right: 10px;">&times;</button>
                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/welcome-modal-text.jpg" style="margin-left:-5px" />
                <!-- constant contact form -->
                <!-- <form name="ccoptin" action="http://visitor.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-top: 10px;">
                    <input type="text" name="ea" value="" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; border:1px solid #CCCCCC; width:250px; " class="input-large input" placeholder="Email Address...">
                    <input type="submit" name="go" value="GO" class="submit" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -4px; height:30px">
                    <input type="hidden" name="m" value="1102867877524">
                    <input type="hidden" name="p" value="oi">
                </form> -->
                <!-- end constant contact form -->

                <!-- Begin MailChimp Signup Form -->
                <form action="//ansoniawines.us10.list-manage.com/subscribe/post?u=ecdc119b3e0f9307376bd0bb7&amp;id=c9624d5296" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate style="margin-top: 10px;">
                    <input type="email" value="" name="EMAIL" class="required email input-large input" id="mce-EMAIL" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; border:1px solid #CCCCCC; width:250px;" placeholder="Email Address...">
                    <div style="position: absolute; left: -5000px;">
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <input type="text" name="b_ecdc119b3e0f9307376bd0bb7_c9624d5296" tabindex="-1" value="">
                    </div>
                    <input type="submit" value="GO" name="subscribe" style="font-family:Verdana,Arial,Helvetica,sans-serif; font-size:10px; position: relative; top: -4px; height:30px">
                </form>
                <!--End mc_embed_signup-->

                <hr style="margin:5px 0; margin-right: 100px" />

                <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/welcome-modal-unsubscribe.jpg" style="margin-left:-5px" />
            </div>

        </div>

        <div id="content">