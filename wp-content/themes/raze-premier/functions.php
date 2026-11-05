<?php
/**
 * Raze Premier theme bootstrap.
 *
 * @package raze
 */

defined( 'ABSPATH' ) || exit;

define( 'RAZE_VERSION', '1.2.0' );
define( 'RAZE_DIR', get_template_directory() );
define( 'RAZE_URI', get_template_directory_uri() );

require RAZE_DIR . '/inc/helpers.php';
require RAZE_DIR . '/inc/content.php';
require RAZE_DIR . '/inc/tools.php';
require RAZE_DIR . '/inc/customizer.php';
require RAZE_DIR . '/inc/leads.php';
require RAZE_DIR . '/inc/seo.php';

/**
 * Theme supports and menus.
 */
function raze_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 64, 'width' => 240, 'flex-width' => true, 'flex-height' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary menu', 'raze' ),
			'footer'  => __( 'Footer menu', 'raze' ),
		)
	);
}
add_action( 'after_setup_theme', 'raze_setup' );

/**
 * Styles and scripts.
 */
function raze_assets() {
	$css = RAZE_DIR . '/assets/css/main.css';
	$js  = RAZE_DIR . '/assets/js/main.js';

	wp_enqueue_style( 'raze-main', RAZE_URI . '/assets/css/main.css', array(), RAZE_VERSION . '.' . filemtime( $css ) );
	wp_enqueue_script( 'raze-main', RAZE_URI . '/assets/js/main.js', array(), RAZE_VERSION . '.' . filemtime( $js ), array( 'strategy' => 'defer', 'in_footer' => true ) );

	// Block library CSS is only useful on regular pages and posts.
	if ( is_front_page() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'global-styles' );
		wp_dequeue_style( 'classic-theme-styles' );
	}
}
add_action( 'wp_enqueue_scripts', 'raze_assets', 20 );

/**
 * Mark that JS is available so reveal animations can start hidden.
 * If the main script fails to load, the class is removed and content shows.
 */
function raze_js_flag() {
	echo "<script>document.documentElement.classList.add('js');setTimeout(function(){if(!window.razeReady){document.documentElement.classList.remove('js');}},3500);</script>\n";
}
add_action( 'wp_head', 'raze_js_flag', 0 );

/**
 * Preload the two fonts used above the fold.
 */
function raze_preload_fonts() {
	foreach ( array( 'archivo', 'hanken-grotesk' ) as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( RAZE_URI . '/assets/fonts/' . $font . '.woff2' )
		);
	}
}
add_action( 'wp_head', 'raze_preload_fonts', 1 );

/**
 * Theme favicon, used until a Site Icon is set in the Customizer.
 */
function raze_favicon() {
	if ( has_site_icon() ) {
		return;
	}
	printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( RAZE_URI . '/assets/img/favicon.svg' ) );
}
add_action( 'wp_head', 'raze_favicon', 2 );

/**
 * Remove emoji scripts: the site does not use them.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
