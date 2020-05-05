<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

$classes  = Field::make( 'text', 'crb_class' );
$content  = Field::make( 'rich_text', 'crb_content' );
$title    = Field::make( 'text', 'crb_title' );
$subtitle = Field::make( 'text', 'crb_subtitle' );
$image = Field::make( 'image', 'crb_image' );


Container::make( 'post_meta', 'About Us Layouts' )
         ->show_on_post_type( 'page' )
         ->show_on_template( 'about-page.php' )
         ->add_fields( array(
	         Field::make( 'text', 'crb_quote_link', __( 'Quote Link', CHILD_TEXT_DOMAIN ) ),
         	
	         Field::make( 'complex', 'crb_about_block_layouts' ,'Layouts' )->set_layout( 'tabbed-vertical' )
     			/**
	          	* TEXT EDITOR
	          	*/
	          	->add_fields( 'crb_about_text_editor', 'Text Editor', array(
			         $classes,
			         $content,
		         ) )

	          	/**
	          	* HEADER AREA
	          	*/
	          	->add_fields( 'crb_about_header_area', 'Header Area', array(
	          		$classes,
	          		$image,
	          		$title
		         ) )

		         /**
		          * 3 LOGOS
		          */
		          ->add_fields( 'crb_about_three_logos', 'Three Logos', array(
			         $classes,
			         $title,
			         Field::make( 'complex', 'crb_logo_item' )->set_layout( 'tabbed-horizontal' )
			              ->add_fields( array(
				              $image,
				              Field::make( 'text', 'crb_logo_title' ),
			              ) )

		         ) )

	             /**
		          * LEADERS
		          */
		          ->add_fields( 'crb_about_leaders', 'Leaders', array(
			         $classes,
			         $title,
			         Field::make( 'complex', 'crb_leaders' )->set_layout( 'tabbed-horizontal' )
			              ->add_fields( array(
				              $image,
				              Field::make( 'text', 'crb_leader_name' )->set_width(50),
				              Field::make( 'text', 'crb_leader_bio' )->set_width(50),
				              Field::make( 'textarea', 'crb_leader_experiense' )->set_rows(4),
				              Field::make( 'textarea', 'crb_leader_education' )->set_rows(4),
			              ) )

		         ) )     

                 /**
                  * TEXT BLOCK
                  */
                 ->add_fields('crb_about_text_block', 'Text Block', array(
		         	$classes,
		         	$title,
                 	Field::make( 'textarea', 'crb_text_block_content','Content' )->set_rows(4),
                 ))


                 /**
                  * SIX BOXES
                  */
                 ->add_fields('crb_about_six_boxes' ,'Six Box', array(
		         	$classes,
                     Field::make('complex','crb_six_box')->set_layout( 'tabbed-horizontal' )
                     ->add_fields(array(
                        $image,
                        $title,
                     	$subtitle,
                     	Field::make( 'color', 'crb_six_box_color', 'Background Color' ),
                     ))
                 ))


                 /**
                  * LOGOS LIST
                  */
                 ->add_fields('crb_about_logos_list' , 'Logos List', array(
                     $classes,
                     $title,
                     Field::make('complex','crb_logo_list')->set_layout( 'tabbed-horizontal' )
                     ->add_fields(array(
                        $image,
                     ))
                 ))

                 
                 /**
                  * MAP
                  */
                 ->add_fields('crb_about_map' , 'Map' , array(
                     $classes,
                     $title,
                     $subtitle,
                     $image,
                 ))
		       

         ) );