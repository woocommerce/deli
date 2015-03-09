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
	$header_bg_color 	= storefront_sanitize_hex_color( get_theme_mod( 'storefront_header_background_color', apply_filters( 'storefront_default_header_background_color', '#fcfcfc' ) ) );
	$accent_color		= storefront_sanitize_hex_color( get_theme_mod( 'storefront_accent_color' ) );

	$darken_factor		= -15;
	$lighten_factor		= 15;
	$style = '
		.bs-primary-navigation {
			background-color: ' . $header_bg_color . ';
			background:' . $header_bg_color . '; /* Old browsers */
			background: -moz-linear-gradient(top, ' . storefront_adjust_color_brightness( $header_bg_color, $lighten_factor ) . ' 0%,' . $header_bg_color . ' 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,' .  $header_bg_color . '), color-stop(100%,' .  $header_bg_color . ')); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, ' . storefront_adjust_color_brightness( $header_bg_color, $lighten_factor ) . ' 0%,' .  $header_bg_color . ' 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, ' . storefront_adjust_color_brightness( $header_bg_color, $lighten_factor ) . ' 0%,' .  $header_bg_color . ' 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top, ' . storefront_adjust_color_brightness( $header_bg_color, $lighten_factor ) . ' 0%,' .  $header_bg_color . ' 100%); /* IE10+ */
			background: linear-gradient(to bottom, ' . storefront_adjust_color_brightness( $header_bg_color, $lighten_factor ) . ' 0%,' .  $header_bg_color . ' 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=' .  storefront_adjust_color_brightness( $header_bg_color, $lighten_factor ) . ', endColorstr=' .  $header_bg_color . ',GradientType=0 ); /* IE6-9 */
		}

		.single-product div.product .summary .price {
			color: ' . $accent_color . ';
		}';

	wp_add_inline_style( 'bs-style', $style );
}

/**
 * Book store background settings
 * @return array $args the modified args.
 */
function bs_background( $args ) {
	$args['default-image'] 		= get_stylesheet_directory_uri() . '/images/wood.jpg';
	$args['default-attachment'] = 'fixed';

	return $args;
}
