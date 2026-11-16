<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

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

function cwl_enqueue_assets() {
    wp_enqueue_style(
        'cwl-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        filemtime( get_template_directory() . '/assets/css/main.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'cwl_enqueue_assets' );