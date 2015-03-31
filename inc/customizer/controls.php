<?php
/**
 * Artisan Customizer controls
 *
 * @package artisan
 */

/**
 * Customize some of the default Storefront controls.
 * @return void
 */
function artisan_customize_storefront_controls( $wp_customize ) {
	$wp_customize->get_control( 'storefront_header_background_color' )->section 	= 'nav';
	$wp_customize->get_setting( 'storefront_header_background_color' )->transport 	= 'refresh';
	$wp_customize->get_control( 'storefront_header_background_color' )->label 		= __( 'Navigation background color', 'artisan' );

	if ( class_exists( 'Storefront_Designer' ) ) {
		/**
		 * Header Background
		 */
		$wp_customize->add_setting( 'artisan_header_background_color', array(
			'default'           => '',
			'sanitize_callback' => 'storefront_sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'artisan_header_background_color', array(
			'label'	   		=> __( 'Background color', 'artisan' ),
			'description' 	=> __( 'For use with the Sticky Header option', 'artisan' ),
			'section'  		=> 'header_image',
			'settings' 		=> 'artisan_header_background_color',
			'priority' 		=> 75,
		) ) );
	}
}
