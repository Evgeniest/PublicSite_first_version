<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

$menu_options = array('0' => '&mdash; Select &mdash;');
$menus = wp_get_nav_menus();
foreach ($menus as $menu) {
	$menu_options[$menu->term_id] = __( $menu->name);
}

Container::make( 'theme_options', 'Theme Options' )
	->add_fields( array(
	         Field::make( 'checkbox', 'crb_css_dev_mode' )
	              ->set_option_value( 'yes' ),
             Field::make('text', 'crb_comment_moderator_mail')
         ) );

Container::make( 'theme_options', 'Header Options' )
	->set_page_parent('Theme Options')
	->add_fields( array(
		Field::make( 'text', 'crb_header_button_link' ),
		Field::make( 'text', 'crb_header_Email' ),
		Field::make( 'text', 'crb_header_subscribe_class' ),
	) );




Container::make( 'theme_options', 'Footer Options' )
	->set_page_parent('Theme Options')
	->add_fields( array(
		
		Field::make( 'select', 'crb_footer_menu_column1', __( 'Menu Column 1' ) )
			->set_width( 33 )
			->set_options( $menu_options),

		Field::make( 'select', 'crb_footer_menu_column2', __( 'Menu Column 2' ) )
			->set_width( 33 )
			->set_options( $menu_options )
		->set_default_value( 'right-sidebar' ),

		Field::make( 'select', 'crb_footer_menu_column3', __( 'Menu Column 3' ) )
			->set_width( 33 )
			->set_options( $menu_options)
		->set_default_value( 'right-sidebar' ),
		Field::make( 'text', 'crb_footer_support_mail', __( 'Email' ) )->set_width( 50 ),

		Field::make( 'textarea', 'crb_footer_support_text', __( 'Extra Information' ) )->set_rows(4)->set_width( 50 ),
		Field::make( 'text', 'crb_footer_support_fb', __( 'Facebook link' ) )->set_width( 50 ),
		Field::make( 'text', 'crb_footer_support_twitter', __( 'Twitter link' ) )->set_width( 50 ),
		Field::make( 'text', 'crb_footer_support_linkedin', __( 'Linkedin link' ) )->set_width( 50 ),
		Field::make( 'text', 'crb_footer_support_youtube', __( 'Youtube link' ) )->set_width( 50 ),
		Field::make( 'text', 'crb_footer_support_google', __( 'Google link' ) )->set_width( 50 ),
		Field::make( 'text', 'crb_footer_support_in', __( 'In link' ) )->set_width( 50 ),
		Field::make( 'textarea', 'crb_footer_review', __( 'YotPo badge coden' ) )->set_rows(4),

		Field::make( 'complex', 'crb_footer_partners', __( 'Partners Logos' ) )
			->set_layout('tabbed-horizontal')
			->setup_labels( array(
				'plural_name' => __( 'Partners Logos' ),
				'singular_name' => __( 'Partner Logo' ),
			) )
			->add_fields( array(
				Field::make( 'image', 'crb_footer_partner_logo', __( 'Partner Logo' ) )->set_width( 50 ),
			) ),

		Field::make( 'image', 'crb_footer_next_logo', __( 'Next Insurance Logo' ) )->set_width( 33 ),
		Field::make( 'select', 'crb_footer_legal_menu', __( 'Legal Menu' ) )->set_options( $menu_options )->set_width( 33 ),
		Field::make( 'textarea', 'crb_footer_secure_code', __( 'Security Code' ) )->set_width( 33 ),
		

	) );


Container::make( 'theme_options', 'Blog Options' )
         ->set_page_parent('Theme Options')
         ->add_fields( array(
	         Field::make( 'text', 'crb_blog_quote_link','Quote Url' ),
	         Field::make( 'text', 'crb_blog_category', __( 'Primary category id', CHILD_TEXT_DOMAIN ) ),
     		 Field::make( 'text', 'crb_blog_index', __( 'Last posts limit', CHILD_TEXT_DOMAIN ) ),
			 Field::make( 'text', 'crb_blog_sticky_form_ID' ),
     		 Field::make('complex','crb_recommended_posts')->set_layout( 'tabbed-horizontal' )
             ->add_fields(array(
	         	Field::make( 'text', 'crb_recommended_post_id'),
             ))
         ) );