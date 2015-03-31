<?php
/**
 * Artisan setup functions
 *
 * @package artisan
 */

/**
 * Assign the Artisan version to a var
 */
$theme 				= wp_get_theme( 'artisan' );
$artisan_version 	= $theme['Version'];

/**
 * Enqueue Storefront Styles
 * @return void
 */
function artisan_enqueue_styles() {
	global $storefront_version;

    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );
}

/**
 * Enqueue Bootique Styles
 * @return void
 */
function artisan_enqueue_child_styles() {
	global $artisan_version;

    wp_enqueue_style( 'artisan-style', get_stylesheet_uri(), array( 'storefront-style' ), $artisan_version );
    wp_enqueue_style( 'copse', '//fonts.googleapis.com/css?family=Copse', array( 'artisan-style' ) );
    wp_enqueue_style( 'anonymous-pro', '//fonts.googleapis.com/css?family=Anonymous+Pro:400,400italic,700', array( 'artisan-style' ) );
    wp_enqueue_style( 'kalam', '//fonts.googleapis.com/css?family=Kalam:400,700', array( 'artisan-style' ) );
    wp_enqueue_style( 'oswald', '//fonts.googleapis.com/css?family=Oswald', array( 'artisan-style' ) );
}

/**
 * Shop columns
 * @return int number of columns
 */
function artisan_loop_columns( $columns ) {
	$columns = 4;
	return $columns;
}

/**
 * Adjust related products columns
 * @return array $args the modified arguments
 */
function artisan_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']		= 4;

	return $args;
}
