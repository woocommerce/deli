<?php
/**
 * Storganic structural hooks and filters
 *
 * @package storganic
 */

/**
 * Layout
 */
add_action( 'storefront_header', 'storganic_primary_navigation_wrapper', 45 );
add_action( 'storefront_header', 'storganic_primary_navigation_wrapper_close', 65 );

add_action( 'storefront_content_top', 'storganic_content_wrapper', 5 );
add_action( 'storefront_content_bottom', 'storganic_content_wrapper_close', 5 );

add_filter( 'storefront_products_per_page', 'storganic_products_per_page' );