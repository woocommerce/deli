<?php
/**
 * General setup hooks and filters
 *
 * @package storganic
 */

/**
 * Add Storganic specific CSS selectors based on customizer settings
 */
add_action( 'wp_enqueue_scripts', 								'storganic_add_customizer_css', 1000 );

/**
 * Adjust Storefront default controls
 */
add_action( 'customize_register', 								'storganic_customize_storefront_controls', 99 );

/**
 * Customizer default color tweaks
 */
add_filter( 'storefront_default_heading_color', 				'storganic_color_charcoal' );
add_filter( 'storefront_default_footer_heading_color', 			'storganic_color_white' );


// The navigation bg
add_filter( 'storefront_default_header_background_color', 		'storganic_color_orange' );

add_filter( 'storefront_default_footer_background_color', 		'storganic_color_charcoal' );

add_filter( 'storefront_default_header_link_color', 			'storganic_color_white' );
add_filter( 'storefront_default_header_text_color', 			'storganic_color_white' );

add_filter( 'storefront_default_button_background_color', 		'storganic_color_blue' );
add_filter( 'storefront_default_button_text_color', 			'storganic_color_white' );

add_filter( 'storefront_default_button_alt_background_color', 	'storganic_color_pink' );
add_filter( 'storefront_default_button_alt_text_color', 		'storganic_color_white' );

add_filter( 'storefront_default_footer_link_color', 			'storganic_color_tan' );

add_filter( 'storefront_default_text_color', 					'storganic_color_english_winter' );
add_filter( 'storefront_default_footer_text_color', 			'storganic_color_white' );

add_filter( 'storefront_default_accent_color', 					'storganic_color_blue' );

add_filter( 'storefront_default_background_color', 				'storganic_color_leather' );



/**
 * Custom background
 */
add_filter( 'storefront_custom_background_args', 'storganic_background' );