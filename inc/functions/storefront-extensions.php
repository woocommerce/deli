<?php
/**
 * Book Store Storefront extension compatibility
 *
 * @package book store
 */

/**
 * Remove Customizer settings added by Storefront extensions that this theme is incompatible with.
 * @return void
 */
function bs_customize_storefront_extensions( $wp_customize ) {
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
function bs_set_theme_mods() {
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
	set_theme_mod( 'sd_content_background_color', '#fff' );
}

/**
 * Add custom CSS based on settings in Storefront core
 * @return void
 */
function bs_add_extension_customizer_css() {
	$content_background_color = storefront_sanitize_hex_color( get_theme_mod( 'sd_content_background_color', apply_filters( 'storefront_default_background_color', '#fcfcfc' ) ) );

	$style = '
		.site-content .col-full,
		.header-widget-region .col-full {
			background-color: ' . $content_background_color . ';
		}';

	wp_add_inline_style( 'bs-style', $style );
}
