<?php
/**
 * Deli_Integrations Class
 * Provides integrations with Storefront extensions by removing/changing incompatible controls/settings. Also adjusts default values
 * if they need to differ from the original setting.
 *
 * @author   WooThemes
 * @since    2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Deli_Integrations' ) ) {

class Deli_Integrations {

	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'customize_register',	array( $this, 'edit_controls' ),						99 );
		add_action( 'customize_register',	array( $this, 'set_extension_default_settings' ),		99 );
		add_action( 'init',					array( $this, 'default_theme_mod_values' )				);
		add_action( 'after_switch_theme', 	array( $this, 'edit_theme_mods' ) 						);
		add_action( 'wp_enqueue_scripts', 	array( $this, 'add_integrations_css' ),					1000 );
	}

	/**
	 * Returns an array of the desired Storefront extension settings
	 * @return array
	 */
	public function get_deli_extension_defaults() {
		return apply_filters( 'deli_default_extension_settings', $args = array(
			'sd_content_background_color'	=> '#f9f9f9',
			'swc_product_columns'			=> 4 ,
		) );
	}

    /**
	 * Set default settings for Storefront extensions to provide compatibility with Deli.
	 * @uses get_deli_extension_defaults()
	 * @return void
	 */
	public function set_extension_default_settings( $wp_customize ) {
		foreach ( Deli_Integrations::get_deli_extension_defaults() as $mod => $val ) {
			$setting = $wp_customize->get_setting( $mod );

			if ( is_object( $setting ) ) {
				$setting->default = $val;
			}
		}
	}

	/**
	 * Returns a default theme_mod value if there is none set.
	 * @uses get_deli_defaults()
	 * @return void
	 */
	public function default_theme_mod_values() {
		foreach ( Deli_Integrations::get_deli_extension_defaults() as $mod => $val ) {
			add_filter( 'theme_mod_' . $mod, function( $setting ) use ( $val ) {
				return $setting ? $setting : $val;
			});
		}
	}

    /**
	 * Remove unused/incompatible controls from the Customizer to avoid confusion
	 * @return void
	 */
	public function edit_controls( $wp_customize ) {
		$wp_customize->remove_control( 'sd_header_layout' );
		$wp_customize->remove_control( 'sd_fixed_width' ); // Content frame
		$wp_customize->remove_control( 'sd_button_flat' );
		$wp_customize->remove_control( 'sd_button_shadows' );
		$wp_customize->remove_control( 'sd_button_background_style' );
		$wp_customize->remove_control( 'sd_button_rounded' );
		$wp_customize->remove_control( 'sd_button_size' );
		$wp_customize->remove_control( 'sd_button_divider_1' );
		$wp_customize->remove_control( 'sd_button_divider_2' );
		$wp_customize->remove_control( 'storefront_footer_background_color' );
		$wp_customize->remove_control( 'sd_header_layout_divider_before' );
	}

	/**
	 * Remove any pre-existing theme mods for settings that are incompatible with Deli.
	 * @return void
	 */
	public function edit_theme_mods() {
		// Reset certain theme settings from the db
		remove_theme_mod( 'sd_header_layout' );
		remove_theme_mod( 'sd_fixed_width' ); // Content frame
		remove_theme_mod( 'sd_button_flat' );
		remove_theme_mod( 'sd_button_shadows' );
		remove_theme_mod( 'sd_button_background_style' );
		remove_theme_mod( 'sd_button_rounded' );
		remove_theme_mod( 'sd_button_size' );
		remove_theme_mod( 'storefront_footer_background_color' );
	}

	/**
	 * Add CSS using settings obtained from the theme options.
	 * @return void
	 */
	public function add_integrations_css() {
		$style = '';

		if ( class_exists( 'Storefront_Designer' ) || class_exists( 'Storefront_Powerpack' ) ) {

			if ( class_exists( 'Storefront_Designer' ) ) {
				$content_background_color = sanitize_hex_color( get_theme_mod( 'sd_content_background_color', apply_filters( 'deli_default_content_background_color', '#f9f9f9' ) ) );
			} else {
				$content_background_color = sanitize_hex_color( get_theme_mod( 'sp_content_background_color', apply_filters( 'deli_default_content_background_color', '#f9f9f9' ) ) );
			}

			$style .= '
				.content-area {
					background-color: ' . $content_background_color . ';
				}

				.site-main:before {
		   			background: -webkit-linear-gradient(rgba(#000,0) 0%, transparent 0%), -webkit-linear-gradient(135deg, ' . $content_background_color . ' 33.33%, transparent 33.33%) 0 0%, rgba(#000,0) -webkit-linear-gradient(45deg, ' . $content_background_color . ' 33.33%, rgba(#000,0) 33.33%) 0 0%;
				}';
		}

		if (  '' !== $style  ) {
			wp_add_inline_style( 'storefront-child-style', $style );
		}
	}
}

}

return new Deli_Integrations();