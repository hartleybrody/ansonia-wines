<?php
/*
Template Name: Single Column Page
*/
get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="row">
            <div class="span10 offset1" id="page-content">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php the_content(); ?>
                </article>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>