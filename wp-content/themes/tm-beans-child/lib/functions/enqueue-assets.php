<?php
//// Remove Beans Default Styling
//remove_theme_support( 'beans-default-styling' );
// Enqueue uikit assets

//Dev css
beans_add_smart_action( 'wp_enqueue_scripts', 'wst_enqueue_dev_styles' );
//Prod css, autocompile
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'wst_enqueue_styles', 5 );


function wst_enqueue_dev_styles() {
	//dev css mode: available to livereload and source maps trough codekit, gulp ir grunt
	if(!carbon_get_theme_option('crb_css_dev_mode')) {
		return;
	}
	$style_version = @exec('git rev-parse --short HEAD');
	error_log($style_version);
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/less/style.css?v='.$style_version );

}

function wst_enqueue_styles(){
//	Prod css mode: autocompile
	if(carbon_get_theme_option('crb_css_dev_mode')) {
		return;
	}
//	 Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'beans_child', CHILD_URL . '/assets/less/initial-theme' );
//Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', array(
		CHILD_URL . '/assets/less/fonts.less',
		CHILD_URL . '/assets/less/mymixins.less',

		CHILD_URL . '/assets/less/partials/default.less',
		CHILD_URL . '/assets/less/partials/typo.less',
		CHILD_URL . '/assets/less/layouts/text-area.less',
		CHILD_URL . '/assets/less/layouts/icon-text-boxes.less',
		CHILD_URL . '/assets/less/layouts/parallax.less',
		CHILD_URL . '/assets/less/layouts/lightbox-gallery.less',
		CHILD_URL . '/assets/less/layouts/slider.less',
		CHILD_URL . '/assets/less/layouts/slideshow-panel.less',
		CHILD_URL . '/assets/less/layouts/switcher.less',
		CHILD_URL . '/assets/less/layouts/accordion.less',
		CHILD_URL . '/assets/less/layouts/coverage-plan.less',
		CHILD_URL . '/assets/less/layouts/left-right.less',
		CHILD_URL . '/assets/less/layouts/testimonials.less',
		CHILD_URL . '/assets/less/layouts/three-col-image.less',
		CHILD_URL . '/assets/less/layouts/three-logos.less',
		CHILD_URL . '/assets/less/partials/header-page.less',
		CHILD_URL . '/assets/less/partials/footer.less',
		CHILD_URL . '/assets/less/partials/nav.less',
		CHILD_URL . '/assets/less/partials/sidebar.less',
		CHILD_URL . '/assets/less/partials/widgets.less',
		CHILD_URL . '/assets/less/partials/content.less',
		CHILD_URL . '/assets/less/partials/pages.less',
		CHILD_URL . '/assets/less/partials/in-the-news.less',
		CHILD_URL . '/assets/less/partials/about-us.less',
		CHILD_URL . '/assets/less/partials/blog.less',
		CHILD_URL . '/assets/less/partials/search.less',
		CHILD_URL . '/assets/less/partials/single-post.less',
		CHILD_URL . '/assets/less/partials/landing-page.less',
		CHILD_URL . '/assets/less/partials/lead-form-page.less'

	), 'less' );


}
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'wst_enqueue_uikit_assets', 5 );

function wst_enqueue_uikit_assets() {



	beans_compiler_add_fragment( 'uikit', array(
//		CHILD_URL . '/assets/js/animatedtext.js',
		CHILD_URL . '/assets/js/theme.js'
	), 'js' );


	beans_uikit_enqueue_components( array(
		'contrast',
		'cover',
		'animation',
//		'modal',
		'overlay',
//		'column',
//		'switcher',
//		'scrollspy'
	) );
	beans_uikit_enqueue_components( array(
		'sticky',
//		'slideshow',
//		'slider',
//		'lightbox',
		'grid',
//		'parallax',
//		'dotnav',
//		'slidenav',
		'accordion',
		'toggle'
	),
		'add-ons' );

}

add_action('wp_enqueue_scripts','wst_load_insert_js');
function wst_load_insert_js(){
//	if(is_paged()){
//		return;
//	}
	wp_enqueue_style( 'slick-css',  CHILD_URL . '/assets/css/slickcss.css');
	wp_enqueue_script('insert-js', CHILD_JS.'insert.js', array('jquery'),'1.0.0','true');
	wp_enqueue_script('dotdotdot-js', CHILD_JS.'jquery.dotdotdot.js', array('jquery'));
	wp_enqueue_script('slick', CHILD_JS.'slick.min.js');

}


