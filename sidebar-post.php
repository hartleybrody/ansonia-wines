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
                    <li class="widget">
                        <h2 class="widgettitle">About this Wine</h2>
                        <?php 

                            $vigneron = get_post_meta($post->ID, 'vigneron', True);
                            $location = get_post_meta($post->ID, 'location', True);
                            $grape = get_post_meta($post->ID, 'grape', True);
                            $vintage = get_post_meta($post->ID, 'vintage', True);
                            $price = get_post_meta($post->ID, 'price', True);
                            $purchase_link = get_post_meta($post->ID, 'purchase_link', True);
                            $purchase_text = get_post_meta($post->ID, 'purchase_text', True);

                            if($vigneron){
                                echo '<span class="key">Vigneron:</span> <span class="value">';
                                echo $vigneron;
                                echo '</span>';
                            }

                            if($location){
                                echo '<span class="key">Location:</span> <span class="value">';
                                echo $location;
                                echo '</span>';
                            }

                            if($grape){
                                echo '<span class="key">Grape:</span> <span class="value">';
                                echo $vigneron;
                                echo '</span>';
                            }

                            if($vintage){
                                echo '<span class="key">Vintage:</span> <span class="value">';
                                echo $vigneron;
                                echo '</span>';
                            }

                            if($price){
                                echo '<span class="key">price:</span> <span class="value">';
                                echo $vigneron;
                                echo '</span>';
                            }

                            if($purchase_link){
                                echo '<span class="key">PURCHASE:</span> <a class="value" href="';
                                echo $purchase_link;
                                echo '">';
                                if ($purchase_text){
                                    echo $purchase_text;
                                } else{
                                    echo "click here to buy";
                                }
                                echo '</a>';
                            }

                        ?>
                    </li>
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

                            echo("<ul>\n");
                            foreach ($posts as $post) {
                                echo("<li>\n");
                                echo("<a href='" . get_permalink($post->ID) . "'>");
                                echo get_the_title($post->ID);
                                echo("</a>\n");
                                echo("</li>\n");
                            }
                            echo("</ul>");

                        ?>
                    </li>-->
                    <li class="widget">
                        <h2 class="widgettitle">Winemaker Profile</h2>
                        <?php 
                            $results = get_terms('vigneron');
                            //print_r($results);
                           
                            $first_key = key($results);
                            $slug = $results[$first_key]->slug;
                            echo("<p class='lead'>");
                            echo($results[0]->description);
                            echo("</p>");

                        ?>
                    </li>
                    <?php dynamic_sidebar( 'post' ); ?>
                </ul>
            </div>
