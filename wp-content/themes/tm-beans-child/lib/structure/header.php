<?php

beans_add_smart_action( 'beans_header', 'header_gtm' );
function header_gtm() {
	if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) {
		gtm4wp_the_gtm_tag();
	}
}

beans_add_smart_action( 'wp', 'wst_set_up_header_structure' );
function wst_set_up_header_structure() {

	beans_remove_action( 'beans_site_title_tag' );
	beans_remove_output( 'beans_site_title_text' );
	// beans_add_smart_action( 'beans_site_title_link_prepend_markup', 'wst_display_site_title' );
	// function wst_display_site_title() {
	// 	echo '<span>next</span>insurance';
	// }
	beans_replace_attribute('beans_site_branding','class','uk-float-left','uk-align-small-left','uk-align-large-left');


	//sticky header
	beans_add_attribute( 'beans_header', 'data-uk-sticky', "" );

//	beans_wrap_markup( 'beans_header', 'beans_header_wrapper', 'div', array(
//		'class' => 'tm-header-wrapper uk-cover-background',
//	) );

	// Breadcrumb
	beans_remove_action( 'beans_breadcrumb' );

	//menu after header
	beans_modify_action_hook( 'beans_primary_menu', 'beans_header_after_markup' );
	//search
	beans_add_smart_action('beans_primary_menu_append_markup', 'header_search');
	

// centered menu
	beans_replace_attribute( 'beans_primary_menu', 'class', 'uk-float-right', 'uk-text-center' );
	beans_add_attribute( 'beans_menu[_navbar]', 'class', 'uk-display-inline-block' );
	beans_add_attribute( 'beans_menu_item', 'class', 'uk-text-left' );

//	phone
	beans_add_smart_action( 'beans_header', 'header_phone' );
	function header_phone() {
		$phone = esc_html(carbon_get_theme_option('crb_header_Email'));?>
		<a href="<?php echo get_site_url();?>/contact-us/" class="contact contact-link-mobile"><i class="uk-icon-envelope-o"></i></a>
		<a href="<?php echo get_site_url();?>/contact-us/" class="contact contact-link-desktop"><i class="uk-icon-envelope-o"></i> Contact us </a>

	<?php }
	beans_add_smart_action( 'beans_header', 'header_subscribe' );
	function header_subscribe() {
		$subscribe = esc_html(carbon_get_theme_option('crb_header_subscribe_class'));?>
		<a href="" class="header-subscribe <?php echo $subscribe;?>" style="display: none;" title="Click here">Subscribe</a>
	<?php }

	beans_add_smart_action( 'beans_header', 'header_quote_button' );
	function header_quote_button() {
		$link = esc_url(carbon_get_the_post_meta('crb_quote_link'));
		$text = esc_attr(carbon_get_the_post_meta('crb_hero_small_quote'));
		$color = esc_attr(carbon_get_the_post_meta('crb_hero_button_color'));
		?>
		<a href="<?php echo $link?>" style="background-color:
			   <?php echo $color; ?>" 
		   class="uk-button get-quote"><?php if($text) echo $text; else echo 'Get instant quote';?></a>
<?php }

//hero area
	beans_add_smart_action( 'beans_header_after_markup', 'hero_area', 99 );
	function hero_area() {
		include 'views/hero-area-view.php';
	}

	//header home logos
	beans_add_smart_action( 'beans_header_after_markup', 'header_home_logos', 100 );
	function header_home_logos() {
		if(is_page_template('builder-page.php'))
			include 'views/header-home-logos-view.php';

	}
}

add_action('beans_header_append_markup', 'set_header_logo_func');
function set_header_logo_func(){
	?>
	<div class="header-custom-logo"></div>
	<?php
} 


