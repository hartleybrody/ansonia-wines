<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _s
 * @since _s 1.0
 */

get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="row">
            <div class="span6 offset1" id="post-content">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <img src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" />
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div id="byline">
                        <?php the_time('l, F j, Y') ?>
                    </div>
                    <?php the_content(); ?>
                </article>
            </div>
            <div class="span4 visible-desktop">
                <?php get_sidebar('post'); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>