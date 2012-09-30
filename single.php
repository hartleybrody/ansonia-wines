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
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="meta">
                    Posted <?php the_time('l') ?>
                    <?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
                </div>
                <img src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" id="featured-post-img" class="hover-swap"/>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </article>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>