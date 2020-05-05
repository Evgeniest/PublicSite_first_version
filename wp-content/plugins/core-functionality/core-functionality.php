<?php


/*
Plugin Name:  Core Functionality
Description: Core functionality including CPT, taxonomies, shortcodes, metaboxes

*/


define( 'PLUGIN_INC', dirname( __FILE__ ) . '/inc/' );
/**
 * Load plugin files
 *
 * @since 1.0.0
 *
 * @return void
 */
function wst_load_core_plugin_files() {
	$filenames = array(
		'helper-functions.php',
//		'post-types.php',
//		'taxonomies.php',
		'shortcodes.php',
//		'widgets.php',
		'builder-functions.php',
		'about-functions.php',
		'news-functions.php',

	);

	wst_load_core_plugin_specified_files( $filenames );
}


add_action( 'carbon_register_fields', 'wst_load_metaboxes_files' );
/**
 * Load Metaboxes files
 *
 * @since 1.0.0
 *
 * @return void
 */
function wst_load_metaboxes_files() {
	$filenames = array(
		'metaboxes/theme_options.php',
		'metaboxes/builder-metaboxes.php',
		'metaboxes/about-metaboxes.php',
		'metaboxes/news-metaboxes.php',
		'metaboxes/pages-mb.php',
		'metaboxes/landing-page-metaboxes.php' ,
		'metaboxes/lead-form-metaboxes.php'
	);
	wst_load_core_plugin_specified_files( $filenames );
}
/**
 * Load each of the specified files.
 *
 * @since 1.0.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function wst_load_core_plugin_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: PLUGIN_INC;
	foreach ( $filenames as $filename ) {
		include( $folder_root . $filename );
	}
}

wst_load_core_plugin_files();


