<?php
/**
 * General setup hooks and filters
 *
 * @package book store
 */

/**
 * Add Book Store specific CSS selectors based on customizer settings
 */
add_action( 'wp_enqueue_scripts', 								'bs_add_customizer_css', 1000 );

/**
 * Adjust Storefront default controls
 */
add_action( 'customize_register', 								'bs_customize_storefront_controls', 99 );

/**
 * Customizer default color tweaks
 */
add_filter( 'storefront_default_heading_color', 				'bs_color_charcoal' );
add_filter( 'storefront_default_footer_heading_color', 			'bs_color_white' );
add_filter( 'storefront_default_button_text_color', 			'bs_color_charcoal' );

// The navigation bg
add_filter( 'storefront_default_header_background_color', 		'bs_color_orange' );

add_filter( 'storefront_default_footer_background_color', 		'bs_color_charcoal' );

add_filter( 'storefront_default_header_link_color', 			'bs_color_white' );
add_filter( 'storefront_default_header_text_color', 			'bs_color_white' );
add_filter( 'storefront_default_button_alt_text_color', 		'bs_color_white' );

add_filter( 'storefront_default_footer_link_color', 			'bs_color_tan' );

add_filter( 'storefront_default_text_color', 					'bs_color_english_winter' );
add_filter( 'storefront_default_footer_text_color', 			'bs_color_white' );

add_filter( 'storefront_default_accent_color', 					'bs_color_chocolate' );
add_filter( 'storefront_default_button_alt_background_color', 	'bs_color_chocolate' );

add_filter( 'storefront_default_background_color', 				'bs_color_leather' );

add_filter( 'storefront_default_button_background_color', 		'bs_color_newspaper' );

/**
 * Custom background
 */
add_filter( 'storefront_custom_background_args', 'bs_background' );