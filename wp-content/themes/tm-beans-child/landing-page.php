<?php
//Template name: landing page

function landing_page_style_css(){
  wp_deregister_style( 'addThisStylesheet' );
  wp_deregister_style( 'addthis_output' );
  wp_deregister_style( 'addthis' );

  wp_deregister_script( 'addthis' );
  wp_deregister_script( 'addthis_options_page_script' );
  wp_deregister_script( 'addThisScript' );
  wp_deregister_script( 'jquery-ui-widget' );


  $desktop_image_id = esc_attr(carbon_get_the_post_meta('crb_desktop_image') );
  $mobile_image_id = esc_attr(carbon_get_the_post_meta('crb_mobile_image') );
  $desc_background_image_src = wp_get_attachment_image_src($desktop_image_id, 'full');
  $desc_background_image_url = $desc_background_image_src[0];

  $mobile_background_image_src = wp_get_attachment_image_src($mobile_image_id, 'full');
  $mobile_background_image_url = $mobile_background_image_src[0];

  $custom_styles = ".landing-page-container{ background-image: url('{$desc_background_image_url}');}\n";
  $custom_styles .= "@media (max-width: 768px){ .landing-page-container{background-image: url('{$mobile_background_image_url}'); }}";
  ?>
  <style type='text/css'> <?php echo $custom_styles ?> </style>
  <?php
}
add_action('wp_head', 'landing_page_style_css');


beans_remove_attribute('beans_fixed_wrap_main','class','uk-container uk-container-center');
beans_remove_attribute('beans_post','class','uk-panel-box');
beans_remove_attribute('beans_main','class','uk-block');
//beans_remove_action( 'beans_header_partial_template' );
beans_remove_markup( 'beans_primary_menu' );
beans_remove_output( 'beans_primary_menu' );
beans_remove_action( 'header_search' );
beans_remove_markup( 'beans_nav_menu' );
beans_remove_output( 'beans_nav_menu' );
beans_remove_action( 'beans_footer_partial_template' );



add_action( 'beans_post_content_prepend_markup', 'wst_display_landing_page' );
function wst_display_landing_page() {
$title    = esc_attr( carbon_get_the_post_meta('crb_title') );
$subtitle    = esc_attr( carbon_get_the_post_meta('crb_subtitle') );
$form_title = esc_attr( carbon_get_the_post_meta('crb_form_title') );
$mailchimp_form_id = esc_attr(carbon_get_the_post_meta('crb_mailchimp_form_id') );
// getting the information for the popup from the template
//

$popup_title = esc_attr( carbon_get_the_post_meta('crb_popup_title') );
$popup_subtitle = esc_attr( carbon_get_the_post_meta('crb_popup_subtitle') );
$popup_text = esc_attr( carbon_get_the_post_meta('crb_popup_text') );
$popup_button_text = esc_attr( carbon_get_the_post_meta('crb_popup_button_text') );
$popup_button_link = esc_attr( carbon_get_the_post_meta('crb_popup_button_link') );
?>

<div class="landing-page-container" >
  <div class="landing-page-wrapper">
    <div class="landing-page-content-container">
      <div class="landing-page-text-container">
        <div class="landing-page-title"><?php echo $title ?></div>
        <div class="landing-page-subtitle"><?php echo $subtitle?></div>
        <div class="landing-page-form-title"><?php echo $form_title?></div>
        <span class="state-not-supported hide">This state is not yet supported <i class="uk-icon-exclamation-triangle"></i></span>
        <div class="landing-page-form">
          <?php echo do_shortcode('[mc4wp_form id="' . $mailchimp_form_id .'"]'); ?>
          <span class="spu-open-1552"></span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

?>
<div class="landing-popup-container hide">
<div class="landing-popup-wrapper">
<label class="popup-close"></label>
    <h3 class="landing-popup-title"><?php echo $popup_title; ?></h3>
    <div class="landing-popup-subtitle"><?php echo $popup_subtitle; ?></div>
    <div class="pop-text"><?php echo $popup_text; ?></div>
    <p><a class="popup-link"><?php echo $popup_button_text; ?></a></p>
</div>
</div>
  <?php

  $used_redirect = carbon_get_the_post_meta('crb_landing_redirects', 'complex' );
  $active_redirects = array();
  //print_r($used_redirect);
  foreach ( $used_redirect as $redirect ) {
    $active_redirects[ $redirect[ 'business_name' ] ][0] = $redirect[ 'redirect_url' ];
//    if( !empty($redirect[ 'crb_states'])){
//        $active_redirects[ $redirect[ 'business_name' ] ][1] = $redirect[ 'crb_states' ];
//    }
     //getting the array of the unsupported states
    $states = array();
    if( !empty($redirect[ 'crb_states'])){
      foreach( $redirect[ 'crb_states'] as $state){
        $Ustates[]=$state['state_not_supported'];
      }
	    $active_redirects[ $redirect[ 'business_name' ]][1] = $Ustates;
    }

  }

  // Register the script
  wp_register_script( 'landing_page_handle', get_stylesheet_directory_uri() . '/assets/js/landing-page.js', array(), false, true );

  // Localize the script with new data
  $vars_array = array(
      'theme_url' => get_stylesheet_directory_uri(),
      'redirects' => $active_redirects,
      'popup_url' => $popup_button_link,
  );
  wp_localize_script( 'landing_page_handle', 'lp_obj', $vars_array );

  // Enqueued script with localized data.
  wp_enqueue_script( 'landing_page_handle' );
  }

  beans_load_document();

  ?>
