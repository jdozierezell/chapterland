<?php
/**
 * chapterLand functions and definitions
 *
 * @package chapterLand
 */

/**
 * Require admin privileges 
 */
require('library/admin_privilege.php');

/**
 * Require navigation setup 
 */
require('library/navigation.php');

/**
 * Require widget area(s) 
 */
require('library/widget_areas.php');

/**
 * Require custom login page 
 */
require('library/custom_login.php');

/**
 * Require widget area(s) 
 */
require('widgets/login.php');

/**
 *  Require custom image sizes 
 */
require('library/image_sizes.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'chapterland_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chapterland_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on chapterLand, use a find and replace
	 * to change 'chapterland' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'chapterland', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'chapterland_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // chapterland_setup
add_action( 'after_setup_theme', 'chapterland_setup' );

/**
 * Enqueue scripts and styles.
 */
function chapterland_scripts() {
	wp_enqueue_style( 'chapterland-style', get_stylesheet_uri() );
    wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,900' );
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'animate.css', get_template_directory_uri() . '/vendor/animate.css/animate.css' );

	wp_enqueue_script( 'chapterland-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'chapterland-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    wp_enqueue_script( 'slick-nav', get_template_directory_uri(). '/vendor/slick-nav/jquery.slicknav.js', array('jquery'), '20150202', true);
    wp_enqueue_script( 'wow', get_template_directory_uri(). '/vendor/wow/dist/wow.js', array('jquery'), '20150202', true);
    wp_enqueue_script( 'modernizr', get_template_directory_uri(). '/vendor/tympanus/dialog-effects/modernizr.custom.js', array('jquery'), '20150205', true );
    wp_enqueue_script( 'classie', get_template_directory_uri(). '/vendor/tympanus/dialog-effects/classie.js', array('jquery'), '20150202', true );
    wp_enqueue_script( 'dialogFx', get_template_directory_uri(). '/vendor/tympanus/dialog-effects/dialogFx.js', array('modernizr'), '20150202', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chapterland_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
