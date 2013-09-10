<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package _s
 * @since _s 1.0
 */

get_header(); ?>

    
        <div class="row clearfix">
            <div class="span12" id="logo-banner">
                <a href="<?php echo home_url(); ?>">
                    <img src="/wp-content/themes/_s/img/logo.jpg" />
                </a>
            </div>
        </div>
        
        <div class="row clearfix">
            <div class="span4">
                Search Results for: "<?php echo get_search_query(); ?>" 
            </div>
            <div class="span8" style="text-align: right">
                Search again: 
                <span style="position:relative; display:inline-block; top: 5px">
                    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', '_s' ); ?>" />
                        <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', '_s' ); ?>" style="position:relative; top:-5px"/>
                    </form>
                </span>
            </div>
        </div>
        
    <?php if (have_posts()) : ?>
        <?php $post_num = 0; ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php $post_num += 1; ?>
            <?php if ( $post_num % 3 == 1): ?>
                <div class="row tiles">
            <?php endif; ?>
                <div class="span4 tile">
                    <?php if (get_post_type() == "post"): // it's a blog article?>
                        <a href="<?php the_permalink() ?>" >
                            <img src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" class="tile-post-img hover-swap" />
                        </a><br>
                        <a href="<?php the_permalink() ?>" class="tile-title">
                            <?php the_title(); ?>
                        </a>   
                    <?php else : // assume it's a page?> 
                        <a href="<?php the_permalink() ?>" class="tile-title">
                            <h1 style="text-align: center"><?php the_title(); ?> Page</h1>
                        </a>
                    <?php endif; ?>
                </div>
            <?php if ( $post_num % 3 == 0): ?>
                </div> <!--.row.tiles-->
            <?php endif; ?>
            
		<?php endwhile; ?>

    <?php else : ?>
        <div class="row">
            <div class="span12" style="text-align: center">
                <h1>Couldn't find anything...</h4>
                <h2>Try searching again?</h2>
            </div>
        </div>

    <?php endif; ?>

<?php get_footer(); ?>