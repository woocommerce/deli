<?php
/**
 * Book Store Customizer controls
 *
 * @package book store
 */

/**
 * Customize some of the default Storefront controls.
 * @return void
 */
function bs_customize_storefront_controls( $wp_customize ) {
	$wp_customize->get_control( 'storefront_header_background_color' )->section = 'nav';
	$wp_customize->get_control( 'storefront_header_background_color' )->label 	= __( 'Navigation background color', 'book-store' );
}
