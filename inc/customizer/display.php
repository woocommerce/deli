<?php
/**
 * Book Store custom selectors that adopt Storefront customizer settings
 *
 * @package book store
 */

/**
 * Add custom CSS based on settings in Storefront core
 * @return void
 */
function bs_add_customizer_css() {
	$header_bg_color = storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_background_color', apply_filters( 'storefront_default_header_background_color', '#fcfcfc' ) ) );

	$style = '
		.bs-primary-navigation {
			background-color: ' . $header_bg_color . ';
		}';

	wp_add_inline_style( 'bs-style', $style );
}
