<?php
/**
 * Book Store structural hooks and filters
 *
 * @package book store
 */

/**
 * Layout
 */
add_action( 'storefront_header', 'bs_primary_navigation_wrapper', 45 );
add_action( 'storefront_header', 'bs_primary_navigation_wrapper_close', 65 );

add_action( 'storefront_content_top', 'bs_content_wrapper', 5 );
add_action( 'storefront_content_bottom', 'bs_content_wrapper_close', 5 );

add_filter( 'storefront_products_per_page', 'bs_products_per_page' );