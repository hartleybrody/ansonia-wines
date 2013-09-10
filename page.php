<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _s
 * @since _s 1.0
 */

get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
        <div class="row clearfix">
            <div class="span12" id="logo-banner">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/logo.jpg" />
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="span6 offset3">
                <h1 class="title"><?php the_title(); ?></h1>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </article>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>