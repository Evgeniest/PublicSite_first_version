<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

$classes  = Field::make( 'text', 'crb_class' );
$title    = Field::make( 'text', 'crb_title' );
$subtitle = Field::make( 'text', 'crb_subtitle' );
$image = Field::make( 'image', 'crb_image' );


Container::make( 'post_meta', 'In The News Layouts' )
         ->show_on_post_type( 'page' )
         ->show_on_template( 'news-page.php' )
         ->add_fields( array(
             Field::make( 'text', 'crb_quote_link', __( 'Quote Link', CHILD_TEXT_DOMAIN ) ),
            
	         Field::make( 'complex', 'crb_news_block_layouts' ,'Layouts' )->set_layout( 'tabbed-vertical' )

	          	/**
	          	* HEADER AREA
	          	*/
	          	->add_fields( 'crb_news_header_area', 'Header Area', array(
	          		$classes,
	          		$image,
                    Field::make( 'image', 'crb_header_image_mobile' ),
	          		$title,
	          		$subtitle
		         ) )

	          	 /**
                  * LOGOS LIST
                  */
                 ->add_fields('crb_news_logos_list' , 'Logos List', array(
                     $classes,
                     $title,
                     Field::make('complex','crb_logo_list')->set_layout( 'tabbed-horizontal' )
                     ->add_fields(array(
                        $image,
                     ))
                 ))

                  /**
                  * NEWS 
                  */
                 ->add_fields('crb_news', array(
                     Field::make('complex','crb_news_item')->set_layout( 'tabbed-horizontal' )
                     ->add_fields(array(
                        Field::make("date", "crb_date", "Post date"),
                     	$title,
                     	$subtitle,
                        Field::make( 'textarea', 'crb_content' )->set_rows(4),                     	
                        $image,
                        Field::make( 'text', 'crb_publication_link' ),                    	
                        Field::make( 'checkbox', 'crb_show_on_slider' )->set_option_value(1)                   	
                     ))
                 ))

         ) );