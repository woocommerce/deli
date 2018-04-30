<?php
/**
 * Deli Class
 *
 * @author   WooThemes
 * @since    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Deli' ) ) {

class Deli {
	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_filter( 'storefront_woocommerce_args', array( $this, 'woocommerce_support' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_child_styles' ), 99 );
		add_filter( 'storefront_custom_background_args', array( $this, 'background' ) );
		add_action( 'swc_product_columns_default', array( $this, 'loop_columns' ) );
		add_filter( 'storefront_related_products_args',	array( $this, 'related_products_args' ) );
		add_filter( 'body_class', array( $this, 'body_classes' ) );

		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
			add_filter( 'storefront_loop_columns', array( $this, 'loop_columns' ) );
			add_filter( 'storefront_products_per_page', array( $this, 'products_per_page' ) );
		}
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	public function body_classes( $classes ) {
		global $storefront_version;

		if ( version_compare( $storefront_version, '2.3.0', '>=' ) ) {
			$classes[] = 'storefront-2-3';
		}

		return $classes;
	}

	/**
	 * Override Storefront default theme settings for WooCommerce.
	 * @return array the modified arguments
	 */
	public function woocommerce_support( $args ) {
		$args['single_image_width']              = 530;
		$args['thumbnail_image_width']           = 241;
		$args['product_grid']['default_columns'] = 4;
		$args['product_grid']['default_rows']    = 3;

		return $args;
	}

	/**
	 * Enqueue Storefront Styles
	 * @return void
	 */
	public function enqueue_styles() {
		global $storefront_version;

		wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );
	}

	/**
	 * Enqueue Storechild Styles
	 * @return void
	 */
	public function enqueue_child_styles() {
		/**
		 * Styles
		 */
		wp_style_add_data( 'storefront-child-style', 'rtl', 'replace' );
		wp_enqueue_style( 'copse', '//fonts.googleapis.com/css?family=Copse', array( 'storefront-child-style' ) );
		wp_enqueue_style( 'anonymous-pro', '//fonts.googleapis.com/css?family=Anonymous+Pro:400,400italic,700', array( 'storefront-child-style' ) );
		wp_enqueue_style( 'kalam', '//fonts.googleapis.com/css?family=Kalam:400,700', array( 'storefront-child-style' ) );
		wp_enqueue_style( 'oswald', '//fonts.googleapis.com/css?family=Oswald', array( 'storefront-child-style' ) );
	}

	/**
	 * Deli background settings
	 * @return array $args the modified args.
	 */
	public function background( $args ) {
		$args['default-image'] 		= get_stylesheet_directory_uri() . '/images/cardboard.png';
		$args['default-attachment'] = 'fixed';

		return $args;
	}

	/**
	 * Shop columns
	 * @return int number of columns
	 */
	public function loop_columns( $columns ) {
		$columns = 4;
		return $columns;
	}

	/**
	 * Adjust related products columns
	 * @return array $args the modified arguments
	 */
	public function related_products_args( $args ) {
		$args['posts_per_page'] = 4;
		$args['columns']		= 4;

		return $args;
	}

	/**
	 * Products per page
	 * @return int products to display per page
	 */
	public function products_per_page( $per_page ) {
		$per_page = 12;
		return intval( $per_page );
	}
}

}

return new Deli();