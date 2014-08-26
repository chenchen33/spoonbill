<?php
/**
 * spoonbill functions and definitions
 *
 * @package spoonbill
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'spoonbill_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spoonbill_setup() {

	
	// This theme styles the visual editor to resemble the theme style.
	$font_url = 'http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Open+Sans:400italic,800italic,400,300,700,800|Oswald:400,300,700|Berkshire+Swash';
	add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
	  

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on spoonbill, use a find and replace
	 * to change 'spoonbill' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'spoonbill', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */

	add_theme_support( 'post-thumbnails' );
	add_image_size('large-thumb', 1060, 424, true);
	add_image_size('index-thumb', 800, 320, true);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'spoonbill' ),
		'social' => __('Social Menu', 'spoonbill'),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'spoonbill_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	//Enable support for HTML5 markup.
	add_theme_support('html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption',
	));

}
endif; // spoonbill_setup
add_action( 'after_setup_theme', 'spoonbill_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function spoonbill_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'spoonbill' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'spoonbill' ),
		'description'   => __('Footer widgets area appers in the footer of the site', 'spoonbill'),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'spoonbill_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spoonbill_scripts() {
	wp_enqueue_style( 'spoonbill-style', get_stylesheet_uri() );


	if (is_single()) {
	    wp_enqueue_style( 'spoonbill-layout-style' , get_template_directory_uri() . '/layouts/nosidebar.css');
	} elseif(is_page_template('page-templates/page-nosidebar.php')) {
	    wp_enqueue_style( 'spoonbill-layout-style' , get_template_directory_uri() . '/layouts/nosidebar.css');
	} elseif(is_page_template('page-templates/page-nosidebar-gallery.php')) {
	    wp_enqueue_style( 'spoonbill-layout-style' , get_template_directory_uri() . '/layouts/nosidebar-gallery.css');
	} else {
	    wp_enqueue_style( 'spoonbill-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}  

	wp_enqueue_style( 'spoonbill-google-font','http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Open+Sans:400italic,800italic,400,300,700,800|Oswald:400,300,700|Berkshire+Swash' );

	wp_enqueue_style( 'spoonbill-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'spoonbill-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'spoonbill-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20140701', true );

	wp_enqueue_script( 'spoonbill-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spoonbill_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args) {
	$args['smallest'] = 14;
	$args['largest'] = 14;
	$args['unit'] = 'px';
	$args['number'] = 15;
	$args['orderby'] = 'count';
	return $args; 
}


function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
* separate media categories from post categories
* use a custom category called 'category_media' for the categories in the media library
*/
add_filter( 'wpmediacategory_taxonomy', function(){ return 'category_media'; }, 1 ); 

include (TEMPLATEPATH . '/myMarquee/php/marquee_functions_include.php');
include (TEMPLATEPATH . '/myGallery/gallery_functions_include.php');