<?php
/**
 * Template helpers: small functions that templates call to print things.
 *
 * @package cwl-starter
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Block direct access to this file.
}

/**
 * Get a logo image from Theme Options.
 *
 * @param string $field ACF field name, e.g. 'site_logo'.
 * @return array|null   The ACF image array (url, alt, width, height), or null if not set.
 */
function cwl_get_logo_image( $field ) {
    // If ACF isn't active, get_field() doesn't exist. Return null instead of crashing.
    if ( ! function_exists( 'get_field' ) ) {
        return null;
    }

    // The second argument 'option' tells ACF to read from the Theme Options page, not a post.
    $image = get_field( $field, 'option' );

    return is_array( $image ) ? $image : null;
}

/**
 * Print a logo linked to the home page.
 *
 * 'header' uses the main logo, plus the mobile logo on screens up to 760px.
 * 'footer' uses the footer logo.
 * If no image is set, prints the site name as text.
 *
 * @param string $variant 'header' or 'footer'.
 */
function cwl_the_logo( $variant = 'header' ) {
    $home = esc_url( home_url( '/' ) );

    if ( 'footer' === $variant ) {
        $main   = cwl_get_logo_image( 'site_logo_footer' );
        $mobile = null; // The footer doesn't need a separate mobile logo.
    } else {
        $main   = cwl_get_logo_image( 'site_logo' );
        $mobile = cwl_get_logo_image( 'site_logo_mobile' );
    }

    // Fallback: no logo uploaded yet, so show the site name as a text link.
    if ( ! $main ) {
        printf(
            '<a class="site-logo site-logo--text" href="%s">%s</a>',
            $home,
            esc_html( get_bloginfo( 'name' ) )
        );
        return;
    }

    // Alt text from the media library; fall back to the site name.
    $alt = ! empty( $main['alt'] ) ? $main['alt'] : get_bloginfo( 'name' );

    // The header logo is at the top of the page, so load it right away. The footer can wait.
    $loading = ( 'header' === $variant ) ? 'eager' : 'lazy';

    echo '<a class="site-logo site-logo--' . esc_attr( $variant ) . '" href="' . $home . '">';
    echo '<picture>';

    // On screens up to 760px (your mobile breakpoint), the browser picks this image instead.
    if ( $mobile ) {
        printf(
            '<source media="(max-width: 760px)" srcset="%s" width="%d" height="%d">',
            esc_url( $mobile['url'] ),
            (int) $mobile['width'],
            (int) $mobile['height']
        );
    }

    // width and height reserve space so the page doesn't jump while the image loads.
    printf(
        '<img src="%s" alt="%s" width="%d" height="%d" loading="%s" decoding="async">',
        esc_url( $main['url'] ),
        esc_attr( $alt ),
        (int) $main['width'],
        (int) $main['height'],
        esc_attr( $loading )
    );

    echo '</picture></a>';
}