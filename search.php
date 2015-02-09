<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package _s
 * @since _s 1.0
 */

get_header(); ?>
        
        <div class="row">
            <div class="span12" id="search-terms">
                search results: <span class="terms">"<?php echo get_search_query(); ?>"</span>
            </div>
        </div>
        
    <?php if (have_posts()) : ?>

        <?php query_posts('orderby=date&order=DESC&s=' . $_GET['s']); ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php if ($post->post_type == 'page') continue; ?>
            <div class="row result">
                <?php if (get_post_type() == "post"): // it's a blog article?>
                    <div class="span4">
                        <a href="<?php the_permalink() ?>" >
                            <img src="<?php echo get_post_meta( $post->ID, 'full_banner', True ); ?>" class="result-image" />
                        </a>
                    </div>
                    <div class="span8">
                        <div class="post-date">
                            <span>
                                <?php echo get_the_date('l, F j, Y'); ?>
                            </span>
                        </div> <!--.post-date-->

                        <div class="post-title">
                            <a href="<?php the_permalink() ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div> <!--.post-title-->

                        <div class="post-excerpt">
                            <p>
                                <?php echo get_the_excerpt(); ?>
                            </p>
                        </div> <!--.post-excerpt-->

                        <div class="post-more">
                            <a href="<?php the_permalink() ?>">
                                Read More <span class="visible-desktop">&rarr;</span>
                            </a>
                        </div> <!--.post-more-->
                    </div>
                <?php else : // assume it's a page?> 
                    <a href="<?php the_permalink() ?>" class="tile-title">
                        <h1 style="text-align: center"><?php the_title(); ?> Page</h1>
                    </a>
                <?php endif; ?>

            </div>
        <?php endwhile; ?>

    <?php else : ?>
        <div class="row">
            <div class="span12" style="text-align: center">
                <h1>Couldn't find anything...</h4>
                <h2>Try searching again?</h2>
            </div>
        </div>

    <?php endif; ?>

        <div class="row">
            <div class="span12" style="text-align: center;">
                Search again: 
                <span style="position:relative; display:inline-block; top: 5px">
                    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', '_s' ); ?>" />
                        <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', '_s' ); ?>" style="position:relative; top:-5px"/>
                    </form>
                </span>
            </div>
        </div>

<?php get_footer(); ?>