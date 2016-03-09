<?php
/**
 * _s functions and definitions
 *
 * @package _s
 * @since _s 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since _s 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( '_s_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since _s 1.0
 */
function _s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since _s 1.0
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', '_s' ),
		'id' => 'primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _s_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

if ( function_exists('register_sidebar') ) {
	register_sidebars(1, array('name'=>'Homepage'));
	register_sidebars(1, array('name'=>'Post'));
	register_sidebars(1, array('name'=>'Page'));
}

// Custom Taxonomy Code  
add_action( 'init', 'build_taxonomies', 0 );  
  
function build_taxonomies() {
    register_taxonomy(
    	'vigneron',
    	'post',
    	array(
    		'hierarchical' => false,
    		'label' => 'Vigneron',
    		'query_var' => true,
    		'rewrite' => true
    	)
    );
}

// [bartag foo="foo-value"]
function recent_posts_func( $atts ) {

	// get the posts and term for this taxonomy
	$posts = get_posts( array(
	     'posts_per_page' => 3,
	     'vigneron' => $atts['vigneron'],
	));

	$vigneron = get_term_by('slug', $atts['vigneron'], 'vigneron');

	// build the HTML
	$return_html = "<div class='recent-posts'><h3>Recent " . $vigneron->name . " Posts </h3><ul class='unstyled'>";
	foreach ( $posts as $post ) {
		$post_html = "<li class='recent-post'>";
		$post_html .= mysql2date('n.d.y', $post->post_date); // https://codex.wordpress.org/Formatting_Date_and_Time
		$post_html .= ": <a href='" . get_permalink( $post ) . "'>\"" . $post->post_title . "\"</a>";
		$post_html .= "</li>";
		$return_html .= $post_html;
	}
    return $return_html . "</ul></div>";
}
add_shortcode( 'recent_posts', 'recent_posts_func' );
