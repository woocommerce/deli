<?php
/**
 * Deli Storefront extension compatibility
 *
 * @package deli
 */

/**
 * Remove Customizer settings added by Storefront extensions that this theme is incompatible with.
 * @return void
 */
function deli_customize_storefront_extensions( $wp_customize ) {
	$wp_customize->remove_control( 'sd_header_layout' );
	$wp_customize->remove_control( 'sd_fixed_width' ); // Content frame
	$wp_customize->remove_control( 'sd_button_flat' );
	$wp_customize->remove_control( 'sd_button_shadows' );
	$wp_customize->remove_control( 'sd_button_background_style' );
	$wp_customize->remove_control( 'sd_button_rounded' );
	$wp_customize->remove_control( 'sd_button_size' );
	$wp_customize->remove_control( 'storefront_footer_background_color' );
}

/**
 * Set / remove theme mods to suit this theme after activation
 * @return void
 */
function deli_set_theme_mods() {
	// Reset certain theme settings from the db
	remove_theme_mod( 'sd_header_layout' );
	remove_theme_mod( 'sd_fixed_width' ); // Content frame
	remove_theme_mod( 'sd_button_flat' );
	remove_theme_mod( 'sd_button_shadows' );
	remove_theme_mod( 'sd_button_background_style' );
	remove_theme_mod( 'sd_button_rounded' );
	remove_theme_mod( 'sd_button_size' );
	remove_theme_mod( 'storefront_footer_background_color' );

	// Set the content background color on activation
	set_theme_mod( 'sd_content_background_color', '#f9f9f9' );

	// Set the product column setting in the WooCommerce customiser extension
	set_theme_mod( 'swc_product_columns', 4 );
}

/**
 * Add custom CSS based on settings in Storefront core
 * @return void
 */
function deli_add_extension_customizer_css() {
	if ( class_exists( 'Storefront_Designer' ) ) {
		$content_background_color = storefront_sanitize_hex_color( get_theme_mod( 'sd_content_background_color', apply_filters( 'deli_default_content_background_color', '#f9f9f9' ) ) );

		$style = '
			.content-area {
				background-color: ' . $content_background_color . ';
			}

			.site-main:before {
	   			background: -webkit-linear-gradient(rgba(#000,0) 0%, transparent 0%), -webkit-linear-gradient(135deg, ' . $content_background_color . ' 33.33%, transparent 33.33%) 0 0%, rgba(#000,0) -webkit-linear-gradient(45deg, ' . $content_background_color . ' 33.33%, rgba(#000,0) 33.33%) 0 0%;
			}
			';

		wp_add_inline_style( 'deli-style', $style );
	}
}
