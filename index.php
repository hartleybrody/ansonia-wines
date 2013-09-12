<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 * @since _s 1.0
 */

get_header(); ?>

            <div class="row">
                <div class="span8" id="main-content">
                    <?php if ( have_posts() ) : ?>
                        <h2>Recent Posts</h2>
                        <?php $post_num = 1; ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <a href="<?php the_permalink() ?>">
                                <h3 class="post-title"><?php the_title(); ?></h3>
                            </a>
                            <div class="row post">
                                <div class="span2">
                                    <a href="<?php the_permalink() ?>" >
                                        <img 
                                            src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" 
                                            class="tile-post-img 
                                                <?php if( get_post_meta( $post->ID, 'tile_banner_hover', True ) ){ echo "hover-swap"; } else{ echo "hover-fade"; }?>"
                                            <?php if( get_post_meta( $post->ID, 'tile_banner_hover', True ) ){ echo "data-alt-src='" . get_post_meta( $post->ID, 'tile_banner_hover', True ) . "'"; }?> 
                                        />
                                    </a>
                                </div>
                                <div class="span4">
                                    <span class="post-date">
                                        <?php echo get_the_date('l F j, Y'); ?>
                                    </span>
                                    <p class="post-preview">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    <div class="post-read-more">
                                        <a href="<?php the_permalink() ?>">read more ></a>
                                    </div>
                                    <div class="post-custom-field">
                                        <?php 
                                            $purchase_link = get_post_meta( $post->ID, 'purchase_link', True );
                                            if($purchase_link){
                                                echo '<a href="' . $purchase_link . '"';
                                            } else{
                                                echo '<span';
                                            }
                                        ?> class="post-custom-field-value">
                                            <?php echo get_post_meta( $post->ID, 'name_of_wine', True ); ?>
                                        <?php 
                                            $purchase_link = get_post_meta( $post->ID, 'purchase_link', True );
                                            if($purchase_link){
                                                echo '</a>';
                                            } else{
                                                echo '</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div> <!--.row.post-->

                        <?php endwhile; ?>
                        <div id="index-pagination">
                            <!--<div style="float:left;"><?php previous_posts_link('&laquo; Later Posts', 0) ?></div>-->
                            &nbsp;
                            <!--<div style="float:right;"><?php next_posts_link('Earlier Posts &raquo;', 0) ?></div>-->
                            <div style="float:right;"><a href="/author/ansoniawines/page/2/">Earlier Posts &raquo;</a></div>
                        </div>

                    <?php else : ?>

                        <h4>No Posts</h4>
                        <h5>Sorry!</h5>

                    <?php endif; ?>
                </div><!--.span8#main-content-->
                <div class="span4">
                    <h3>Sidebar</h3>
                </div><!--.span8#main-content-->
            </div>

<?php get_footer(); ?>