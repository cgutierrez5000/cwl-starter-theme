<?php
/**
 * Theme options: a "Site Settings" page in the admin, built with ACF Pro.
 *
 * @package cwl-starter
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Block direct access to this file.
}

/**
 * Register the Theme Options page.
 * Only runs when ACF Pro is active, so the theme doesn't break without it.
 */
function cwl_register_options_page() {
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return; // ACF isn't active: do nothing.
    }

    acf_add_options_page( array(
        'page_title' => __( 'Theme Options', 'cwl-starter' ),  // Heading on the page.
        'menu_title' => __( 'Theme Options', 'cwl-starter' ),  // Label in the admin menu.
        'menu_slug'  => 'cwl-theme-options',                   // Used in the URL and in ACF's location rules.
        'capability' => 'edit_theme_options',                  // Admins only.
        'icon_url'   => 'dashicons-admin-generic',
        'position'   => 59,
        'redirect'   => false,
    ) );
}
add_action( 'acf/init', 'cwl_register_options_page' );