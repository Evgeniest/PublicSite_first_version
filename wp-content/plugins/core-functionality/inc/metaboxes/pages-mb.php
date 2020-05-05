<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Hero Image' )
         ->show_on_post_type(  'page' )
		 ->show_on_template('builder-page.php')
         ->add_fields( array(
         	Field::make( 'image', 'crb_hero_image', __( 'Hero Image', CHILD_TEXT_DOMAIN ) ),
         	Field::make( 'text', 'crb_hero_slider_desktop', __( 'Hero Slider Id Desktop', CHILD_TEXT_DOMAIN ) ),
         	Field::make( 'text', 'crb_hero_slider_mobile', __( 'Hero Slider Id Mobile', CHILD_TEXT_DOMAIN ) ),
	         Field::make( 'text', 'crb_hero_heading', __( 'Hero Heading', CHILD_TEXT_DOMAIN ) ),
	         Field::make( 'text', 'crb_hero_subtitle', __( 'Hero Subtitle', CHILD_TEXT_DOMAIN ) ),
	         Field::make( 'text', 'crb_quote_link', __( 'Quote Link', CHILD_TEXT_DOMAIN ) ),
	         Field::make( 'text', 'crb_hero_small_text', __( 'Hero Small Text', CHILD_TEXT_DOMAIN ) ),
		 Field::make( 'color', 'crb_hero_button_color', __( 'Hero button color', CHILD_TEXT_DOMAIN ) ),
	         Field::make( 'text', 'crb_hero_small_quote', __( 'Hero button quote text', CHILD_TEXT_DOMAIN ) ),
		 Field::make( 'text', 'crb_hero_retrieve_quote_text', __( 'Retrieve quote text', CHILD_TEXT_DOMAIN ) ),
         Field::make( 'text', 'crb_hero_retrieve_quote_link', __( 'Retrieve quote Link', CHILD_TEXT_DOMAIN ) ),		 
		 Field::make( 'color', 'crb_hero_retrieve_quote_color', __( 'Retrieve quote color', CHILD_TEXT_DOMAIN ) )
         ) );

Container::make( 'post_meta', 'Testimonials Section' )
         ->show_on_post_type( array( 'post' ) )
         ->add_fields( array(
	         Field::make( 'textarea', 'crb_related_posts', __( 'Related posts shortcodes', CHILD_TEXT_DOMAIN ) ),
	         Field::make( 'text', 'crb_post_quote_link', __( 'Quote Link', CHILD_TEXT_DOMAIN ) )
         ) );
