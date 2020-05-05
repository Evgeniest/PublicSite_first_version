<?php 
//Template name: lead form page


function lead_page_style_css(){
    wp_deregister_style( 'addThisStylesheet' );
  wp_deregister_style( 'addthis_output' );
  wp_deregister_style( 'addthis' );

  wp_deregister_script( 'addthis' );
  wp_deregister_script( 'addthis_options_page_script' );
  wp_deregister_script( 'addThisScript' );
  wp_deregister_script( 'jquery-ui-widget' );

    $button_color = esc_attr( carbon_get_the_post_meta('crb_button_color'));
    $custom_styles = ".active{ background-color:{$button_color} !important; color: white !important;}";
    
    ?>
  <style type='text/css'> <?php echo $custom_styles ?> </style>
  <?php
}
add_action('wp_head', 'lead_page_style_css');


beans_remove_attribute('beans_fixed_wrap_main','class','uk-container uk-container-center');
beans_remove_attribute('beans_post','class','uk-panel-box');
beans_remove_attribute('beans_main','class','uk-block');
beans_remove_action( 'beans_header_partial_template' );
beans_remove_markup( 'beans_primary_menu' );
beans_remove_output( 'beans_primary_menu' );
beans_remove_action( 'header_search' );
beans_remove_markup( 'beans_nav_menu' );
beans_remove_output( 'beans_nav_menu' );
beans_remove_action( 'beans_footer_partial_template' );



add_action( 'beans_post_content_prepend_markup', 'wst_display_lead_page' );
function wst_display_lead_page() {
    $title          = esc_attr( carbon_get_the_post_meta('crb_title') );
    $logo_image_id     = esc_attr( carbon_get_the_post_meta('crb_logo_image'));
    $telephone      = esc_attr( carbon_get_the_post_meta('crb_telephone_number'));
    $subtitle       = esc_attr( carbon_get_the_post_meta('crb_subtitle') );                            
    
    $logo_image = wp_get_attachment_image($logo_image_id,'full');
?>
    <div class="lead-container">
        <div class="lead-header">
            <div class="logo-wrapper"><?php echo $logo_image; ?></div>
            <a href="tel:'<?php echo $telephone; ?>'"><?php echo $telephone; ?></a>
        </div>
        <div class="lead-content">
            <div class="lead-title"><?php echo $title; ?></div>
            <div class="lead-subtitle"><?php echo $subtitle; ?></div>
            <div class="lead-form-container"><?php wst_display_lead_form();?></div>
            
        </div>
    </div>
 <?php 

 // Register the script
    wp_register_script( 'lead_form_handle', get_stylesheet_directory_uri() . '/assets/js/lead-form-page.js', array(), false, true );

    
  // Localize the script with new data
  $theme_url = get_stylesheet_directory_uri();
  
  $vars_array = array(
      'theme_url' => $theme_url 
  );

  wp_localize_script( 'lead_form_handle', 'lp_obj', $vars_array );

  // Enqueued script with localized data.
  wp_enqueue_script( 'lead_form_handle' );
 }

// creating lead form
 function wst_display_lead_form(){
    $button_text     = esc_attr( carbon_get_the_post_meta('crb_button_text') );
    $link_title      = esc_attr( carbon_get_the_post_meta('crb_link_title') );
    $business_json_url = get_stylesheet_directory_uri() . '/assets/json/business.json';
    $state_json_url = get_stylesheet_directory_uri() . '/assets/json/state.json';
    $business_json_str= file_get_contents($business_json_url); 
    $state_json_str= file_get_contents($state_json_url); 

    // checking if we get url parameters cob and cobDefined
    $cob_value = null;
    $cob_defined = null;
    $business_value = "";
    if(isset($_GET['cob'])) {
        $cob_value = $_GET['cob'];
        $business_value = get_business_value_by_id($business_json_str , $cob_value);
    }
    if(isset($_GET['cobDefined'])) {
        $cob_defined = $_GET['cobDefined'];
    }
    ?>
    <form class="lead-form" action="lead-form.php" autocomplete="off" method="POST">
        <div class="business-container">
            
            <?php 
            if($business_value){ 
                if($cob_defined == 1){ ?>
                    <input class="business-label hide" name="cob" placeholder="Select your business" value="<?php echo $business_value; ?>" required>
                    <?php }else{ ?>
                    <span class="business-title">Business</span></br>
                    <input class="business-label" name="cob" placeholder="Select your business" value="<?php echo $business_value; ?>" required>
                    <?php } 
             }else{ ?>
                <span class="business-title">Business</span></br>
                <input class="business-label" name="cob" placeholder="Select your business" readonly required> 
            <?php } ?>
            <span class="dropdown-arrow-up"></span>
            <span class="dropdown-arrow-down"></span>
        </div><?php
        // this div represent the business dropdown and its hidden until the business input is clicked
        // it gets its content from a json file ?>
        <div class="business-overlay-content hide" id="business-overlay-content">
            <div class="dropdown-wrapper">
                <div class="title"><span>Select your business</span></div>
                <span class="business-close">X</span>
                <div class="business-items-wrapper">
                <?php
                
                fill_dropdown_from_json($business_json_str);?>
                </div>
            </div>
        </div>
        <div class="state-container">
            <span class="state-title">State</span></br>
            <input class="state-label" name="state" placeholder="Choose your state" readonly required>
            <span class="dropdown-arrow-up"></span>
            <span class="dropdown-arrow-down"></span>
        </div><?php
        // this div represent the business dropdown and its hidden until the business input is clicked
        // it gets its content from a json file ?>
        <div class="state-overlay-content hide" id="state-overlay-content">
            <div class="dropdown-wrapper">
                <div class="title"><span>Select state</span></br></div>
                <span class="state-close">X</span>
                <div class="state-items-wrapper">
                <?php
                
                fill_dropdown_from_json($state_json_str);?>
                </div>
            </div>
        </div>
        <div class="email-container">
            <span class="email-label">Email Address</span></br>
            <input class="lead-email" type="email" name="email" placeholder="enter your email address" required />
            <span class="lead-email-not-valid"></span>
        </div>
        <div class="submit-container">
            <input class="lead-submit submit-disable" type="submit" value="<?php echo $button_text; ?>" disabled />
            <input class="link-title submit-disable" type="submit" value="<?php echo $link_title; ?>" disabled></div>
        </div>
    </form>   <?php

 }

// decoding the json file and filling the dropdown
  function fill_dropdown_from_json($row_json_str){
    
    $json_array = json_decode($row_json_str); 
    foreach ( $json_array as $key => $id ) { ?>
        <div class="option-wrapper"><a><?php echo $key; ?></a></div>
    <?php
    } 
  }

  function get_business_value_by_id($business_json_str , $cob_value){
    $json_array = json_decode($business_json_str); 
    foreach ( $json_array as $key => $id ) { 
        if($cob_value == $id){
            return $key;
        }
    }
  }

beans_load_document();