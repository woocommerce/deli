<?php
/**
 * Artisan structural functions
 *
 * @package artisan
 */

/**
 * Primary navigation wrapper
 * @return void
 */
function artisan_primary_navigation_wrapper() {
	echo '<section class="artisan-primary-navigation">';
}

/**
 * Primary navigation wrapper close
 * @return void
 */
function artisan_primary_navigation_wrapper_close() {
	echo '</section>';
}

/**
 * Content wrapper
 * @return void
 */
function artisan_content_wrapper() {
	echo '<div class="artisan-content-wrapper">';
}

/**
 * Content wrapper close
 * @return void
 */
function artisan_content_wrapper_close() {
	echo '</div>';
}

/**
 * Products per page
 * @return int products to display per page
 */
function artisan_products_per_page( $per_page ) {
	$per_page = 12;
	return intval( $per_page );
}