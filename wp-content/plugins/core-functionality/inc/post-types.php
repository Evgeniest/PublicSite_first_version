<?php
// Flush rewrite rules for custom post types
//add_action( 'after_switch_theme', 'wst_flush_rewrite_rules' );
//
//// Flush your rewrite rules
//function wst_flush_rewrite_rules() {
//	flush_rewrite_rules();
//}
//add_action( 'init', 'register_dishes_post_type' );
//function register_dishes_post_type() {
//
//	$labels = array(
//		'name'          => _x( 'Dishes', 'post type general name', CHILD_TEXT_DOMAIN ),
//		'singular_name' => _x( 'Dish', 'post type singular name', CHILD_TEXT_DOMAIN ),
//		'menu_name'     => _x( 'Dishes', 'admin menu name', CHILD_TEXT_DOMAIN ),
//		'add_new'       => _x( 'Add New Dish', 'faq', CHILD_TEXT_DOMAIN ),
//		'add_new_item'  => _x( 'Add New Dish', CHILD_TEXT_DOMAIN ),
//		'search_items'  => _x( 'Search Dish', CHILD_TEXT_DOMAIN ),
//		'not_found'     => _x( 'No Dish Found', CHILD_TEXT_DOMAIN ),
//
//	);
//	$args   = array(
//		'label'        => __( 'Dishes', CHILD_TEXT_DOMAIN ),
//		'labels'       => $labels,
//		'supports'     => get_cpt_supports(),
//		'public'       => true,
//		'taxonomies'   => array(),
//		'hierarchical' => true,
//		'has_archive'  => true,
//	);
//
//	register_post_type( 'dishes', $args );
//}
//
//function get_cpt_supports() {
//	$all_supports = get_all_post_type_supports( 'post' );
//
//
//	$all_supports = array_keys( $all_supports );
//
//	$supports_to_exclude = array(
//		'comments',
//		'trackbacks',
//		'post_formats',
//		'custom-fields',
//	);
//
//
//	$supports   = array_filter( $all_supports, function ( $support ) use ( $supports_to_exclude ) {
//		return ! in_array( $support, $supports_to_exclude );
//	} );
//	$supports[] = 'page-attributes';
//
//	return ( $supports );


//}
