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

        
        <div class="row clearfix">
            <div class="span12" id="logo-banner">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/logo.jpg" />
                </a>
            </div>
        </div>
        
			<?php if ( have_posts() ) : ?>
                <?php $post_num = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php $post_num += 1; ?>
                    <?php if ( $post_num == 1): // this is the latest post, display as banner ?>
                    
                        <div class="row">
                            <div class="span12" id="featured-post">
                                <a href="<?php the_permalink() ?>" >
                                        <img 
                                            src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" 
                                            class="tile-post-img 
                                                <?php if( get_post_meta( $post->ID, 'full_banner_hover', True ) ){ echo "hover-swap"; } else{ echo "hover-fade"; }?>"
                                            <?php if( get_post_meta( $post->ID, 'full_banner_hover', True ) ){ echo "data-alt-src='" . get_post_meta( $post->ID, 'full_banner_hover', True ) . "'"; }?> 
                                        />
                                </a><br>
                                <a href="<?php the_permalink() ?>" id="featured-post-title">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                        </div>
                        
                    <?php else: // this is not the first post, display as a tile ?>
                        <?php if ( $post_num % 3 == 2): ?>
                            <div class="row tiles">
                        <?php endif; ?>
                                <div class="span4 tile">
                                    <a href="<?php the_permalink() ?>" >
                                        <img 
                                            src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" 
                                            class="tile-post-img 
                                                <?php if( get_post_meta( $post->ID, 'tile_banner_hover', True ) ){ echo "hover-swap"; } else{ echo "hover-fade"; }?>"
                                            <?php if( get_post_meta( $post->ID, 'tile_banner_hover', True ) ){ echo "data-alt-src='" . get_post_meta( $post->ID, 'tile_banner_hover', True ) . "'"; }?> 
                                        />
                                    </a><br>
                                    <a href="<?php the_permalink() ?>" class="tile-title">
                                        <?php the_title(); ?>
                                    </a>
                                </div>
                        <?php if ( $post_num % 3 == 1): ?>
                            </div> <!--.row.tiles-->
                        <?php endif; ?>
                        
                    <?php endif; ?>

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

<?php get_footer(); ?>