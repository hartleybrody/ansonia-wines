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
            <div class="span6 offset3">
                <h1><?php the_title(); ?></h1>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </article>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>