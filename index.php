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
                <div class="span8 offset2" id="main-content">
                    <?php if ( have_posts() ) : ?>

                        <div class="row">
                            <div class="span8">
                                <hr />
                                <h4 class="page-title">Recent Posts</h4>
                            </div>
                        </div>

                        <?php while ( have_posts() ) : the_post(); ?>
                            
                            <div class="row post">
                                <div class="span8">

                                    <div class="post-banner">
                                        <a href="<?php the_permalink() ?>" >
                                            <img 
                                                src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" 
                                                class="tile-post-img 
                                                    <?php if( get_post_meta( $post->ID, 'full_banner_hover', True ) ){ echo "hover-swap"; } else{ echo "hover-fade"; }?>"
                                                <?php if( get_post_meta( $post->ID, 'full_banner_hover', True ) ){ echo "data-alt-src='" . get_post_meta( $post->ID, 'full_banner_hover', True ) . "'"; }?>
                                                style="width:1000px" 
                                            />
                                        </a>
                                    </div> <!--.post-banner-->

                                    <div class="post-date">
                                        <span class="post-date">
                                            <?php echo get_the_date('l F j, Y'); ?>
                                        </span>
                                    </div> <!--.post-date-->

                                    <div class="post-title">
                                        <a href="<?php the_permalink() ?>">
                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                    </div> <!--.post-title-->

                                    <div class="post-excerpt">
                                        <p>
                                            <?php echo get_the_excerpt(); ?>
                                        </p>
                                    </div> <!--.post-excerpt-->

                                    <div class="post-more">
                                        <a href="<?php the_permalink() ?>">
                                            Read More &rarr;
                                        </a>
                                    </div> <!--.post-excerpt-->
                                    
                                </div> <!--.span8-->
                            </div> <!--.row.post-->

                            <hr />

                        <?php endwhile; ?>
                        <div id="index-pagination">
                            <div style="float:left;"><?php previous_posts_link('&laquo; Later Posts', 0) ?></div>
                            &nbsp;
                            <div style="float:right;"><?php next_posts_link('Earlier Posts &raquo;', 0) ?></div>
                        </div>

                    <?php else : ?>

                        <h4>No Posts</h4>
                        <h5>Sorry!</h5>

                    <?php endif; ?>
                </div><!--.span8#main-content-->
            </div>

<?php get_footer(); ?>