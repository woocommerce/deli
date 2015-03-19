<?php
/**
 * Book Store setup functions
 *
 * @package book store
 */

/**
 * Assign the Book Store version to a var
 */
$theme 			= wp_get_theme( 'book store' );
$bs_version 	= $theme['Version'];

/**
 * Enqueue Storefront Styles
 * @return void
 */
function bs_enqueue_styles() {
	global $storefront_version;

    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );
}

/**
 * Enqueue Bootique Styles
 * @return void
 */
function bs_enqueue_child_styles() {
	global $bs_version;

    wp_enqueue_style( 'bs-style', get_stylesheet_uri(), array( 'storefront-style' ), $bs_version );
    wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic,900', array( 'bs-style' ) );
    wp_enqueue_style( 'kalam', '//fonts.googleapis.com/css?family=Kalam:400,700', array( 'bs-style' ) );
}

/**
 * Shop columns
 * @return int number of columns
 */
function bs_loop_columns( $columns ) {
	$columns = 4;
	return $columns;
}

/**
 * Adjust related products columns
 * @return array $args the modified arguments
 */
function bs_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']		= 4;

	return $args;
}
