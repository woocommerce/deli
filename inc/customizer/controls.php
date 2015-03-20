<?php
/**
 * Storganic Customizer controls
 *
 * @package storganic
 */

/**
 * Customize some of the default Storefront controls.
 * @return void
 */
function storganic_customize_storefront_controls( $wp_customize ) {
	$wp_customize->get_control( 'storefront_header_background_color' )->section 	= 'nav';
	$wp_customize->get_setting( 'storefront_header_background_color' )->transport 	= 'refresh';
	$wp_customize->get_control( 'storefront_header_background_color' )->label 		= __( 'Navigation background color', 'storganic' );
}
