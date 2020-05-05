<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

$classes  = Field::make( 'text', 'crb_class' );
$content  = Field::make( 'rich_text', 'crb_content' );
$title    = Field::make( 'text', 'crb_title' );
$subtitle = Field::make( 'text', 'crb_subtitle' );
$image = Field::make( 'image', 'crb_image' );


Container::make( 'post_meta', 'layouts' )
         ->show_on_post_type( 'page' )
         ->show_on_template( 'builder-page.php' )
         ->add_fields( array(
	         Field::make( 'complex', 'crb_block_layouts' )->set_layout( 'tabbed-vertical' )
             /**
		          * TEXT EDITOR
		          */

		          ->add_fields( 'text_editor', array(
			         $classes,
			         $content,
		         ) )
		         /**
		          * 3 LOGOS
		          */
		          ->add_fields( 'three_logos', array(
			         $classes,
			         $title,
			         $subtitle,
			         Field::make( 'complex', 'crb_logo_item' )->set_layout( 'tabbed-horizontal' )
			              ->add_fields( array(
				              $image,
				              Field::make( 'text', 'crb_logo_title' ),
				              Field::make( 'text', 'crb_logo_subtitle' ),
			              ) )

		         ) )
                 /**
                  * LEFT/RIGHT
                  */
                 ->add_fields('left_right',array(
                    $classes,
                     $title,
                     Field::make('complex','crb_left_right_item')->set_layout( 'tabbed-horizontal' )
                     ->add_fields(array(
                        $image,
                         Field::make( 'text', 'crb_left_right_title', 'title' ),
                         Field::make( 'textarea', 'crb_left_right_content','content' )->set_rows(4),
                     ))
                 ))

                 /**
                  * CUSTOM HEADER FIELDS
                  */
                 ->add_fields('header_fields',array(
                         Field::make( 'image', 'crb_header_field_image', 'Image' ),
                         Field::make( 'text', 'crb_header_field_title','Title' ),
                         Field::make( 'text', 'crb_header_field_color','Text color' ),
                         Field::make( 'text', 'crb_header_field_bg','Background color' ),
                 ))
                 /**
                  * THREE COL IMAGE
                  */
                 ->add_fields('three_col_image', array(
                     $classes,
                     $title,
                     $subtitle,
                     Field::make('complex','crb_three_col_image_item')->set_layout( 'tabbed-horizontal' )
                     ->add_fields(array(
                        $image,
                         Field::make( 'text', 'crb_three_col_image_item_title', 'title' ),
                         Field::make( 'text', 'crb_link', 'Url Link' ),
                     ))
                 ))
		         /**
		          * TESTIMONIALS
		          */
		         ->add_fields('testimonials', array(
			         $classes,
			         $title,
			         Field::make('complex','testimonial_item')->set_layout( 'tabbed-horizontal' )
			              ->add_fields(array(
				              Field::make( 'text', 'crb_image_class' ),
				              $image,
				              Field::make( 'text', 'crb_content_class' ),
				              Field::make( 'textarea', 'crb_testimonial_content', 'Content' )->set_rows(5),
				              Field::make( 'textarea', 'crb_testimonial_author', 'Author' )->set_rows(3),
			              ))
		         ))
		         /**
		          * COVERAGE PLANS
		          */
		         ->add_fields('coverage_plans', array(
			         $classes,
			         $title,
			         Field::make( 'text', 'crb_coverage_cols', 'number of cols' ),
			         Field::make('complex','crb_coverage_item')->set_layout( 'tabbed-horizontal' )
			              ->add_fields(array(
				              Field::make( 'text', 'crb_coverage_class', 'Class' ),
				              Field::make( 'text', 'crb_coverage_popular', 'Popular' ),
				              Field::make( 'text', 'crb_coverage_title', 'Title' ),
				              Field::make( 'textarea', 'crb_coverage_subtitle' )->set_rows(2),
				              Field::make( 'textarea', 'crb_coverage_content', 'Content' ),
			              ))
		         ))
		         /**
		          * ACCORDION
		          */
		         ->add_fields('accordion', array(
			         $classes,
			         $title,
			         Field::make('complex','crb_accordion_item')->set_layout( 'tabbed-horizontal' )
			              ->add_fields(array(
				              Field::make( 'text', 'crb_accordion_title', 'Title' ),
				              Field::make( 'textarea', 'crb_coverage_content', 'Content' )->set_rows(6),
			              ))
		         ))

         ) );