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
