<?php
/**
 * Deli Customizer controls
 *
 * @package deli
 */

/**
 * Customize some of the default Storefront controls.
 * @return void
 */
function deli_customize_storefront_controls( $wp_customize ) {
	$wp_customize->get_control( 'storefront_header_background_color' )->section 	= 'nav';
	$wp_customize->get_setting( 'storefront_header_background_color' )->transport 	= 'refresh';
	$wp_customize->get_control( 'storefront_header_background_color' )->label 		= __( 'Navigation background color', 'deli' );

	if ( class_exists( 'Storefront_Designer' ) ) {
		/**
		 * Header Background
		 */
		$wp_customize->add_setting( 'deli_header_background_color', array(
			'default'           => '',
			'sanitize_callback' => 'storefront_sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'deli_header_background_color', array(
			'label'	   		=> __( 'Background color', 'deli' ),
			'description' 	=> __( 'For use with the Sticky Header option', 'deli' ),
			'section'  		=> 'header_image',
			'settings' 		=> 'deli_header_background_color',
			'priority' 		=> 75,
		) ) );
	}
}
