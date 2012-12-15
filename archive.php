<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 * @since _s 1.0
 */

get_header(); ?>


    <?php if ( have_posts() ) : ?>

        <header class="archive-header">
            <h1 class="archive-title">
                <?php
                    if ( is_category() ) {
                        printf( __( 'Category Archives: %s', '_s' ), '<span>' . single_cat_title( '', false ) . '</span>' );

                    } elseif ( is_tag() ) {
                        printf( __( 'Tag Archives: %s', '_s' ), '<span>' . single_tag_title( '', false ) . '</span>' );

                    } elseif ( is_author() ) {
                        /* Queue the first post, that way we know
                         * what author we're dealing with (if that is the case).
                        */
                        the_post();
                        printf( __( 'Author Archives: %s', '_s' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                        /* Since we called the_post() above, we need to
                         * rewind the loop back to the beginning that way
                         * we can run the loop properly, in full.
                         */
                        rewind_posts();

                    } elseif ( is_day() ) {
                        printf( __( 'Daily Archives: %s', '_s' ), '<span>' . get_the_date() . '</span>' );

                    } elseif ( is_month() ) {
                        printf( __( 'Monthly Archives: %s', '_s' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

                    } elseif ( is_year() ) {
                        printf( __( 'Yearly Archives: %s', '_s' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

                    } else {
                        _e( 'Archives', '_s' );

                    }
                ?>
            </h1>
            <?php
                if ( is_category() ) {
                    // show an optional category description
                    $category_description = category_description();
                    if ( ! empty( $category_description ) )
                        echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

                } elseif ( is_tag() ) {
                    // show an optional tag description
                    $tag_description = tag_description();
                    if ( ! empty( $tag_description ) )
                        echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
                }
            ?>
        </header><!-- .page-header -->

        <div class="row">
            <div class="span9">
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        // get_template_part( 'content', get_post_format() );
                    ?>
                    
                    <div class="row excerpt">
                        <div class="span4">
                            <a href="<?php the_permalink() ?>">
                                <img src="<?php echo get_post_meta( $post->ID, 'tile_banner', True ); ?>" class="tile-post-img <?php if( get_post_meta( $post->ID, 'tile_banner_hover', True ) ){ echo "hover-swap"; } else{ echo "hover-fade"; }?>" />
                            </a>
                        </div><!--.span4-->
                        <div class="span5">
                            <div class="excerpt-header">
                                <span class="categories"><?php 
                                
                                    $categories = get_the_category( $post->ID );
                                    if (count($categories) == 1){
                                        print $categories[0]->name;
                                    }
                                    else{
                                        $str = "";
                                        
                                        foreach($categories as $cat){
                                            $str .= $cat->name .= ", ";
                                        }
                                        
                                        $final_str = rtrim($str, ", "); // remove last ", "
                                        echo $final_str;
                                    }
                                ?></span> | 
                                <span class="date-time">
                                    <?php the_time('l, F jS, Y') ?>
                                </span>
                            </div>
                            <a href="<?php the_permalink() ?>" class="post-title">
                                <?php the_title(); ?>
                            </a><br>
                            <a href="<?php the_permalink() ?>" class="name-of-wine">
                                <?php echo get_post_meta( $post->ID, 'name_of_wine', True ); ?>
                            </a>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink() ?>" class="read-more">Read more...</a>
                        </div><!--.span4-->
                    </div><!--.row-->

                <?php endwhile; ?>
                <div class="pagination">
                    <?php posts_nav_link(); ?> 
                </div>
            </div><!--.span9-->
            <div class="span3">
                <?php get_sidebar(); ?>
            </div>
        </div>
                
    <?php else : ?>

        <!-- no results -->

    <?php endif; ?>

<?php get_footer(); ?>