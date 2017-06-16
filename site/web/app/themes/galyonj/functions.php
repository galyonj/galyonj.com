<?php

/**
 * This is the master functions file for galyonj.com
 * Author: John Galyon
 * Created  April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

// Require stuff
require_once 'inc/breadcrumbs.php';
require_once 'inc/pagination.php';

// Enable support for excerpts on page content types
function add_page_excerpts() {
	add_post_type_support('page', 'excerpt');
}
add_action('init', 'add_page_excerpts');

// Register Theme Features
function custom_theme_features() {

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'comment-form', 'comment-list' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// add support for post thumbnails
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'custom_theme_features' );

/**
 * Register navigation menus
 */
function galyon_nav_menus() {

	$locations = array(
		'footer-nav' => 'Footer Navigation',
		'main-nav'   => 'Main Navigation',
		'social-nav' => 'Social Navigation'
	);

	register_nav_menus( $locations );

}
add_action( 'init', 'galyon_nav_menus' );

/**
 * This strips the WordPress version number from script and stylesheet
 * source files loaded on the pages. As a security best practice
 * two filters are instantiated to call the function below at runtime:
 * One filter for loading stylesheets, another for loading scripts.
 */
function remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );

/**
 * Enqueue scripts and styles specific to this theme
 * We're also adding the server time at which the
 * file was uploaded so that we can do our own version
 * control for testing/cache-busting purposes
 */
function galyon_enqueue() {

	$js_path = trailingslashit( get_template_directory() ) . 'main.min.js';
	$css_path = trailingslashit( get_template_directory() ) . 'style.min.css';

	wp_enqueue_script(

		'main_js',
		trailingslashit( get_template_directory_uri() ) . 'main.min.js',
		false,
		filemtime($js_path),
		true

	);

	wp_enqueue_style(

		'main_css',
		trailingslashit( get_template_directory_uri() ) . 'style.min.css',
		false,
		filemtime($css_path),
		'all'

	);

}
add_action( 'wp_enqueue_scripts', 'galyon_enqueue');

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function add_editor_styles() {

	add_editor_style( 'editor-style.min.css' );

}
add_action( 'init', 'add_editor_styles' );

/**
 * Replace image titles in images that come through the editor.
 */
function restore_image_title( $html, $id ) {

	$attachment = get_post($id);
	$mytitle = $attachment->post_title;

	return str_replace('<img', '<img title="' . $mytitle . '" '  , $html);

}
add_filter( 'media_send_to_editor', 'restore_image_title', 15, 2 );

// emojis are stupid and we hate them
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Force the front-end of the site to use whatever
// jquery version is included with the theme
if ( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', function() {
		wp_deregister_script('jquery');

		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false,
			'', false );

		wp_enqueue_script('jquery');
	} );
}

function word_count() {
	global $post;

	$content = get_post_field( 'post_content', $post->ID );

	$word_count = str_word_count( strip_tags( $content ) );

	return $word_count;
}

/**
 * Automate output read-more link after the excerpt
 * on the index page as well as category and tag
 * archive pages
 *
 * @param $excerpt
 *
 * @return string
 */
function manual_excerpt_more( $excerpt ) {
	$excerpt_more = '';
	$icon = '<i class="fa fa-plus-square" aria-hidden="true"></i>';
	if( is_home() || is_category() || is_tag() || is_search() ) {

		if( has_excerpt() ) {
			$excerpt_more = '<a href="' . get_permalink() . '" rel="nofollow">' . $icon . '</a>';
		}

	}
	return $excerpt . $excerpt_more;
}
add_filter( 'get_the_excerpt', 'manual_excerpt_more' );