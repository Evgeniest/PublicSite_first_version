<?php
//add_action('init', 'register_menus_taxonomy');
//
//function register_menus_taxonomy(){
//
//	$labels = array(
//		'name'          => _x( ' Menus', 'taxonomy general name', CHILD_TEXT_DOMAIN ),
//		'singular_name' => _x( ' Menu', 'taxonomy singular name', CHILD_TEXT_DOMAIN ),
//		'menu_name'     => _x( 'Menus', 'taxonomy general name', CHILD_TEXT_DOMAIN ),
//		'all_items'     => __( 'All Menus', CHILD_TEXT_DOMAIN ),
//		'add_new_item'  => __( 'Add new Menu', CHILD_TEXT_DOMAIN ),
//		'edit_item'     => __( 'Edit Menu', CHILD_TEXT_DOMAIN ),
//		'add_new_item'  => __( 'Add New Menu', CHILD_TEXT_DOMAIN ),
//		'update_item'   => __( 'Update Menu', CHILD_TEXT_DOMAIN ),
//	);
//	$args   = array(
//		'labels'            => $labels,
//		'show_in_nav_menu'  => true,
//		'hierarchical'      => true,
//		'show_admin_column' => true,
//	);
//
//	register_taxonomy('menus','dishes', $args);
//}