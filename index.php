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

			<?php if ( have_posts() ) : ?>
                <?php $post_num = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php $post_num += 1; ?>
                    <?php if ( $post_num == 1): // this is the latest post, display as banner ?>
                    
                        <div class="row">
                            <div class="span12" id="featured-post">
                                <a href="<?php the_permalink() ?>" >
                                    <img src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" id="featured-post-img" />
                                </a>
                            </div>
                        </div>
                        
                    <?php else: // this is not the first post, display as a tile ?>
                        <?php if ( $post_num % 3 == 2): ?>
                            <div class="row tiles">
                        <?php endif; ?>
                                <div class="span4" id="tile-post">
                                    <a href="<?php the_permalink() ?>" >
                                        <img src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" id="tile-post-img" />
                                    </a>
                                </div>
                        <?php if ( $post_num % 3 == 1 &! $post_num == 1): ?>
                            </div> <!--.row.tiles-->
                        <?php endif; ?>
                        
                    <?php endif; ?>

				<?php endwhile; ?>

			<?php else : ?>

				<h4>No Posts</h4>
                <h5>Sorry!</h5>

			<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>