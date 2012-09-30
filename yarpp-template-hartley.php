<?php if (have_posts()):?>
<h5>You might like</h5>
<div class="row">
    <?php while (have_posts()) : the_post(); ?>
    <div class="span3">
        <a href="<?php the_permalink() ?>">
            <img src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" class="tile-post-img hover-swap" />
        </a>
    </div>
    <?php endwhile; ?>
</div>
<?php else: ?>
<!--no related posts-->
<?php endif; ?>