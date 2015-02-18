<?php
/**
 * General setup hooks and filters
 *
 * @package book store
 */

/**
 * Styles / scripts
 */
add_action( 'wp_enqueue_scripts', 'bs_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bs_enqueue_child_styles', 999 );

/**
 * Extension integrations / tweaks
 */
add_action( 'customize_register', 'bs_customize_storefront_extensions', 99 );
add_action( 'after_switch_theme', 'bs_set_theme_mods' );
add_action( 'wp_enqueue_scripts', 'bs_add_extension_customizer_css', 1000 );
