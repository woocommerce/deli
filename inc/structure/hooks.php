<?php
/**
 * Deli structural hooks and filters
 *
 * @package deli
 */

/**
 * Layout
 */
add_action( 'storefront_header', 'deli_primary_navigation_wrapper', 45 );
add_action( 'storefront_header', 'deli_primary_navigation_wrapper_close', 65 );

add_action( 'storefront_content_top', 'deli_content_wrapper', 5 );
add_action( 'storefront_content_bottom', 'deli_content_wrapper_close', 5 );

add_filter( 'storefront_products_per_page', 'deli_products_per_page' );