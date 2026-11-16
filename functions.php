<?php
/**
 * CWL Starter theme functions.
 *
 * @package cwl-starter
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Block direct access to this file.
}

// Load the theme options (ACF Theme Options page).
require_once get_template_directory() . '/inc/options.php';

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
 * Load the front-end assets: the main stylesheet and the main script.
 * filemtime() is used as the version number, so the URL changes whenever the file does
 * and browsers and caches never serve an old copy.
 */
function cwl_enqueue_assets() {
    // Main stylesheet: reset, fonts, typography, base styles.
    wp_enqueue_style(
        'cwl-main',                                                        // Handle: a unique name for this file.
        get_template_directory_uri() . '/assets/css/main.css',             // URL the browser loads.
        array(),                                                           // Dependencies: none.
        filemtime( get_template_directory() . '/assets/css/main.css' )     // Version, read from the file on disk.
    );

    // Main script: shared JavaScript for the whole theme.
    wp_enqueue_script(
        'cwl-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        filemtime( get_template_directory() . '/assets/js/main.js' ),
        array(
            'strategy'  => 'defer',  // Download in the background, run after the page is parsed.
            'in_footer' => true,     // Print just before </body> (needs wp_footer() in the template).
        )
    );
}
add_action( 'wp_enqueue_scripts', 'cwl_enqueue_assets' );

/**
 * Preload the heading font (Nunito) so the headline doesn't flash in a fallback font.
 * Runs early in <head>. The crossorigin attribute is required for fonts.
 */
function cwl_preload_fonts() {
    $font = get_template_directory_uri() . '/assets/fonts/nunito-latin-wght-normal.woff2';
    echo '<link rel="preload" href="' . esc_url( $font ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'cwl_preload_fonts', 1 );