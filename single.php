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
        
        <div class="row clearfix">
            <div class="span12" id="article-banner">
                <img src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" />
            </div>
        </div>

        <div class="row">
            <div class="span6 offset3" id="header-meta">
                <h1 class="title"><?php the_title(); ?></h1>
                
                <h3 class="subtitle"><?php echo get_post_meta( $post->ID, 'name_of_wine', True ); ?></h3>
                <ul id="sharing">
                  <?php if ( get_post_meta( $post->ID, 'purchase_text', True ) ) : ?>
                    <li>
                        <a href="<?php echo get_post_meta( $post->ID, 'purchase_link', True ); ?>" id="purchase-link"><?php echo get_post_meta( $post->ID, 'purchase_text', True ); ?></a>
                    </li>
                    <li>
                         <!--or share:-->&nbsp;
                    </li>
                    <li>
                         <!--or share:-->&nbsp;
                    </li>
                  <?php endif; ?>
                    <li>
                        <a href="https://twitter.com/intent/tweet/?url=<?php echo urlencode( get_permalink($post->ID) ); ?>&text=<?php echo urlencode( the_title("", "", False) ); ?>&via=ansoniawines" target="_blank">
                            <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/twitter.png" id="twitter-icon" />
                        </a>
                    </li>
                    <li>
                        <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                            <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/facebook.png"  id="facebook-icon" />
                        </a>
                    </li>
                    <li>
                        <a href="mailto:?subject=Check%20out%20'<?php the_title(); ?>'&body=<?php echo urlencode( get_permalink($post->ID) ); ?>" target="_blank">
                            <img src="<?php echo get_site_url(); ?>/wp-content/themes/_s/img/fwd.png"  id="email-icon" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="span6 offset1">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div id="byline">
                        <?php the_time('l, F j, Y') ?>
                    </div>
                    <?php the_content(); ?>
                </article>
            </div>
            <div class="span3 offset1">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>