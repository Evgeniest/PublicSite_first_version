<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


$logo_image               = Field ::make( 'image', 'crb_logo_image');
$telephone                = Field ::make( 'text', 'crb_telephone_number');
$title                    = Field ::make( 'text', 'crb_title');
$subtitle                 = Field ::make( 'text', 'crb_subtitle' );
$button_text              = Field ::make( 'text', 'crb_button_text' );  
$button_color             = Field::make( 'color', 'crb_button_color', 'Button Color' );
                                                       
$link_title               = Field ::make( 'text', 'crb_link_title' );




Container ::make( 'post_meta', 'Next App Layout' )
          -> show_on_post_type( 'page' )
          -> show_on_template( 'lead-form-page.php' )
          -> add_fields(
              array(
                  $logo_image ,
                  $telephone,
                  $title,
                  $subtitle,
                  $button_text,
                  $button_color,
                  $link_title
              )
          );
         