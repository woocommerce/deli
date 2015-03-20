<?php
/**
 * Storganic structural functions
 *
 * @package storganic
 */

/**
 * Primary navigation wrapper
 * @return void
 */
function storganic_primary_navigation_wrapper() {
	echo '<section class="storganic-primary-navigation">';
}

/**
 * Primary navigation wrapper close
 * @return void
 */
function storganic_primary_navigation_wrapper_close() {
	echo '</section>';
}

/**
 * Content wrapper
 * @return void
 */
function storganic_content_wrapper() {
	echo '<div class="storganic-content-wrapper">';
}

/**
 * Content wrapper close
 * @return void
 */
function storganic_content_wrapper_close() {
	echo '</div>';
}

/**
 * Products per page
 * @return int products to display per page
 */
function storganic_products_per_page( $per_page ) {
	$per_page = 12;
	return intval( $per_page );
}