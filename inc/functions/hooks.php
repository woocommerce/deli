<?php
/**
 * General setup hooks and filters
 *
 * @package storganic
 */

/**
 * Styles / scripts
 */
add_action( 'wp_enqueue_scripts', 'storganic_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'storganic_enqueue_child_styles', 999 );

/**
 * Layout tweaks
 */
add_action( 'storefront_loop_columns', 'storganic_loop_columns' );
add_action( 'swc_product_columns_default', 'storganic_loop_columns' );
add_filter( 'storefront_related_products_args', 'storganic_related_products_args' );

/**
 * Extension integrations / tweaks
 */
add_action( 'customize_register', 'storganic_customize_storefront_extensions', 99 );
add_action( 'after_switch_theme', 'storganic_set_theme_mods' );
add_action( 'wp_enqueue_scripts', 'storganic_add_extension_customizer_css', 1000 );
