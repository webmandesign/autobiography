<?php defined( 'ABSPATH' ) || exit;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function autobiography_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'autobiography_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function autobiography_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'autobiography_pingback_header' );

/**
 * Excerpt length.
 */
function autobiography_excerpt_length() {
	return 32;
}
add_action( 'excerpt_length', 'autobiography_excerpt_length' );

/**
 * Excerpt more.
 */
function autobiography_excerpt_more() {
	return '&hellip;';
}
add_action( 'excerpt_more', 'autobiography_excerpt_more' );
