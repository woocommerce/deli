<?php
/**
 * Deli custom selectors that adopt Storefront customizer settings
 *
 * @package deli
 */

/**
 * Add custom CSS based on settings in Storefront core
 * @return void
 */
function deli_add_customizer_css() {
	$navigation_bg_color 		= storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_background_color', apply_filters( 'storefront_default_header_background_color', '#fcfcfc' ) ) );
	$accent_color				= storefront_sanitize_hex_color( get_theme_mod( 'storefront_accent_color' ) );
	$footer_link_color 			= storefront_sanitize_hex_color( get_theme_mod( 'storefront_footer_link_color', apply_filters( 'storefront_default_footer_link_color', '#96588a' ) ) );
	$footer_heading_color 		= storefront_sanitize_hex_color( get_theme_mod( 'storefront_footer_heading_color', apply_filters( 'storefront_default_footer_heading_color', '#494c50' ) ) );
	$footer_text_color 			= storefront_sanitize_hex_color( get_theme_mod( 'storefront_footer_text_color', apply_filters( 'storefront_default_footer_text_color', '#61656b' ) ) );
	$button_background_color 	= storefront_sanitize_hex_color( get_theme_mod( 'storefront_button_background_color', apply_filters( 'storefront_default_button_background_color', '#60646c' ) ) );
	$button_text_color 			= storefront_sanitize_hex_color( get_theme_mod( 'storefront_button_text_color', apply_filters( 'storefront_default_button_text_color', '#ffffff' ) ) );

	$header_bg_color 			= storefront_sanitize_hex_color( get_theme_mod( 'deli_header_background_color', '' ) );

	$darken_factor		= -15;
	$lighten_factor		= 15;
	$style = '
		.deli-primary-navigation {
			background:' . $navigation_bg_color . ';
		}

		.single-product div.product .summary .price {
			color: ' . $accent_color . ';
		}

		.header-widget-region {
			color: ' . $footer_text_color . ';
		}

		.header-widget-region a:not(.button) {
			color: ' . $footer_link_color . ';
		}

		.single-product div.product .summary .price {
			color: ' . $button_text_color . ';
			background-color: ' . $button_background_color . ';
		}

		.header-widget-region h1, .header-widget-region h2, .header-widget-region h3, .header-widget-region h4, .header-widget-region h5, .header-widget-region h6 {
			color: ' . $footer_heading_color . ';
		}';

	if ( class_exists( 'Storefront_Designer' ) ) {
		$sticky 				= get_theme_mod( 'sd_header_sticky', 'default' );

		if ( 'sticky-header' == $sticky ) {
			$style .= '
				.site-header {
					background-color:' . $header_bg_color . ' !important;
				}
			';
		}
	}

	wp_add_inline_style( 'deli-style', $style );
}

/**
 * Book store background settings
 * @return array $args the modified args.
 */
function deli_background( $args ) {
	$args['default-image'] 		= get_stylesheet_directory_uri() . '/images/cardboard.png';
	$args['default-attachment'] = 'fixed';

	return $args;
}
