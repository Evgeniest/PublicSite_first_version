<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


$desktop_background_image = Field ::make( 'image', 'crb_desktop_image', 'Desktop Background Image' );
$mobile_background_image  = Field ::make( 'image', 'crb_mobile_image', 'Mobile Background Image' );
$title                    = Field ::make( 'text', 'crb_title' );
$subtitle                 = Field ::make( 'text', 'crb_subtitle' );
$form_title               = Field ::make( 'text', 'crb_form_title' );
$mailchimp_form_id        = Field ::make( 'text', 'crb_mailchimp_form_id' );
$redirect_sperator        = Field ::make( "separator", "crb_redirects_options", "Manager Business Redirects " );
$popup_sperator           = Field ::make( "separator", "crb_popup_options", "PopUp Layout " );
$popup_title              = Field::make( 'text', "crb_popup_title", "PopUp Title" );
$popup_subtitle           =  Field ::make( 'text', "crb_popup_subtitle", "PopUp SubTitle" );
$popup_text               =   Field ::make( 'textarea', "crb_popup_text", "PopUp Text" );
$popup_button_text        =  Field ::make( 'text', "crb_popup_button_text", "PopUp button Text" );
$popup_button_link        =  Field ::make( 'text', "crb_popup_button_link", "PopUp button Link" );

// Get all business options without redirects
$used_redirect = array();
$pages         = get_pages(
    array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'landing-page.php'
    )
);
if( ! empty( $pages[ 0 ] ) ) {
  $landing_page  = $pages[ 0 ];
  $used_redirect = carbon_get_post_meta( $landing_page -> ID, 'crb_landing_redirects', 'complex' );
}

// get all the businesses
$all_bizs = file_get_contents( get_stylesheet_directory() . '/assets/json/industry.json' );
$all_bizs = json_decode( $all_bizs, true );

$bizs = array();
foreach ( $all_bizs as $key => $cat ) {
  foreach( $cat as $idx => $biz ){
    if( $idx === 0 ){
      continue;
    }

    $bizFull = $biz . ' (' . $key . ')';

    $bizs[] = $bizFull;
  }
}
$bizs = array_combine( $bizs, $bizs );

// get all the states

$all_states = file_get_contents( get_stylesheet_directory() . '/assets/json/state.json' );
$all_states = json_decode( $all_states, true );

$states = array();
foreach ( $all_states as $key => $cat ) {
    $states[$key] = $key;
}

$states_select_field = Field::make( "select", "state_not_supported", "State not supported" )
              ->add_options( $states );

$states_complex_field = Field ::make( 'complex', 'crb_states', 'States not supported' )
    ->set_layout('tabbed-horizontal')
    -> add_fields(
        array(
         $states_select_field,
        )
 );


$redirects = Field ::make( 'complex', 'crb_landing_redirects' )
 -> add_fields(
     array(
         Field::make( "select", "business_name", "Business Name" )
              ->add_options( $bizs ),
         Field ::make( 'text', 'redirect_url' ),
         $states_complex_field,
     )
 );



Container ::make( 'post_meta', 'Landing Page Layout' )
          -> show_on_post_type( 'page' )
          -> show_on_template( 'landing-page.php' )
          -> add_fields(
              array(
                  $desktop_background_image,
                  $mobile_background_image,
                  $title,
                  $subtitle,
                  $form_title,
                  $mailchimp_form_id,
                  $redirect_sperator,
                  $redirects,
                  $popup_sperator,
                  $popup_title,
                  $popup_subtitle,
                  $popup_text,
                  $popup_button_text,
                  $popup_button_link, 
              )
          );
         