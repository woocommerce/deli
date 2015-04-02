<?php
/**
 * Deli structural functions
 *
 * @package deli
 */

/**
 * Primary navigation wrapper
 * @return void
 */
function deli_primary_navigation_wrapper() {
	echo '<section class="deli-primary-navigation">';
}

/**
 * Primary navigation wrapper close
 * @return void
 */
function deli_primary_navigation_wrapper_close() {
	echo '</section>';
}

/**
 * Content wrapper
 * @return void
 */
function deli_content_wrapper() {
	echo '<div class="deli-content-wrapper">';
}

/**
 * Content wrapper close
 * @return void
 */
function deli_content_wrapper_close() {
	echo '</div>';
}

/**
 * Products per page
 * @return int products to display per page
 */
function deli_products_per_page( $per_page ) {
	$per_page = 12;
	return intval( $per_page );
}