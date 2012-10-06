<?php if (have_posts()):?>
<div class="row" id="related-posts">
    <?php while (have_posts()) : the_post(); ?>
    <div class="span3">
        <a href="<?php the_permalink() ?>">
            <img src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" class="tile-post-img hover-swap" />
        </a><br>
        <a href="<?php the_permalink() ?>" class="tile-title">
            <?php the_title(); ?>
        </a>
    </div>
    <?php endwhile; ?>
</div>
<?php else: ?>
<!--no related posts-->
<?php endif; ?>