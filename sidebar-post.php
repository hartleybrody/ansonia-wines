<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package _s
 * @since _s 1.0
 */
?>
            <div id="sidebar">
                <ul>
                        <?php 
                        
                            $vigneron = get_post_meta($post->ID, 'vigneron', True);
                            $location = get_post_meta($post->ID, 'location', True);
                            $grape = get_post_meta($post->ID, 'grape', True);
                            $vintage = get_post_meta($post->ID, 'vintage', True);
                            $price = get_post_meta($post->ID, 'price', True);
                            $purchase_link = get_post_meta($post->ID, 'purchase_link', True);
                            $purchase_text = get_post_meta($post->ID, 'purchase_text', True);

                            $wine_info = $vigneron || $location || $grape || $vintage || $price || $purchase_link;

                            if($wine_info){
                                echo '<li class="widget"> <h2 class="widgettitle">About this Wine</h2>';
                            }

                            echo("<ul class='unstyled'>");

                            if($vigneron){
                                echo '<li><span class="key">Vigneron:</span> <span class="value">';
                                echo $vigneron;
                                echo '</span></li>';
                            }

                            if($location){
                                echo '<li><span class="key">Location:</span> <span class="value">';
                                echo $location;
                                echo '</span></li>';
                            }

                            if($grape){
                                echo '<li><span class="key">Grape:</span> <span class="value">';
                                echo $grape;
                                echo '</span></li>';
                            }

                            if($vintage){
                                echo '<li><span class="key">Vintage:</span> <span class="value">';
                                echo $vintage;
                                echo '</span></li>';
                            }

                            if($price){
                                echo '<li><span class="key">price:</span> <span class="value">';
                                echo $price;
                                echo '</span></li>';
                            }

                            if($purchase_link){
                                echo '<li><span class="key">PURCHASE:</span> <a class="value" href="';
                                echo $purchase_link;
                                echo '">';
                                if ($purchase_text){
                                    echo $purchase_text;
                                } else{
                                    echo "click here to buy";
                                }
                                echo '</a></li>';
                            }

                            echo("</ul>");

                            if($wine_info){
                                echo '</li>';
                            }

                        ?>
                    <!--<li class="widget">
                        <h2 class="widgettitle">Other Posts About This Vigneron</h2>
                        <?php 
                            $results = get_terms('vigneron');
                            //print_r($results);

                            $first_key = key($results);
                            $slug = $results[$first_key]->slug;

                            $args = array(
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'vigneron',
                                        'field' => 'slug',
                                        'terms' => $slug
                                    )
                                ),
                                'numberposts' => 5
                            );
                            $posts = get_posts( $args );

                            // echo("<ul>\n");
                            // foreach ($posts as $post) {
                            //     echo("<li>\n");
                            //     echo("<a href='" . get_permalink($post->ID) . "'>");
                            //     echo get_the_title($post->ID);
                            //     echo("</a>\n");
                            //     echo("</li>\n");
                            // }
                            // echo("</ul>");

                        ?>
                    </li>-->
                    <?php if ( wp_get_post_terms($post->ID, 'vigneron') ) : ?>
                    <li class="widget">
                        <h2 class="widgettitle">Winemaker Profile</h2>
                        <?php 
                            $results = wp_get_post_terms($post->ID, 'vigneron');
                            // print_r($results);
                           
                            $first_key = key($results);
                            $slug = $results[$first_key]->slug;
                            echo("<p class='lead'>");
                            echo($results[0]->description);
                            echo("</p>");

                        ?>
                    </li>
                    <?php endif; ?>
                    <?php dynamic_sidebar( 'post' ); ?>
                </ul>
            </div>
