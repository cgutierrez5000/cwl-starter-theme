<?php
/**
 * CWL Starter theme functions.
 *
 * @package cwl-starter
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Block direct access to this file.
}

/**
 * Theme setup: features WordPress should turn on, and menu locations.
 */
function cwl_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'cwl-starter' ),
        'footer'  => __( 'Footer Menu', 'cwl-starter' ),
    ) );
}
add_action( 'after_setup_theme', 'cwl_setup' );

/**
 * Load the front-end stylesheet.
 * filemtime() is the version number, so the URL changes whenever the file does.
 */
function cwl_enqueue_assets() {
    wp_enqueue_style(
        'cwl-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        filemtime( get_template_directory() . '/assets/css/main.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'cwl_enqueue_assets' );

/**
 * Preload the heading font (Nunito) so the headline doesn't flash in a fallback.
 * Runs early in <head>. The crossorigin attribute is required for fonts.
 */
function cwl_preload_fonts() {
    $font = get_template_directory_uri() . '/assets/fonts/nunito-latin-wght-normal.woff2';
    echo '<link rel="preload" href="' . esc_url( $font ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'cwl_preload_fonts', 1 );