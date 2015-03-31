<?php
/**
 * Artisan structural hooks and filters
 *
 * @package artisan
 */

/**
 * Layout
 */
add_action( 'storefront_header', 'artisan_primary_navigation_wrapper', 45 );
add_action( 'storefront_header', 'artisan_primary_navigation_wrapper_close', 65 );

add_action( 'storefront_content_top', 'artisan_content_wrapper', 5 );
add_action( 'storefront_content_bottom', 'artisan_content_wrapper_close', 5 );

add_filter( 'storefront_products_per_page', 'artisan_products_per_page' );