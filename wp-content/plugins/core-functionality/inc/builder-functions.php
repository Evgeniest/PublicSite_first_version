<?php

//text editor
function wst_display_text_editor( array $layout ) {
	include( 'views/text-editor-view.php' );
}

function wst_display_three_logos(array $layout){
	include( 'views/three-logos-view.php' );
}
function wst_display_left_right(array $layout){
	include('views/left-right-view.php');
}

function wst_display_three_col_image(array $layout){
	include('views/three-col-image-view.php');
}
function wst_display_testimonials(array $layout){
	include('views/testimonials-view.php');
}
function wst_display_coverage_plans(array $layout){
	include('views/coverage-plans-view.php');
}
function wst_display_accordion(array $layout){
	include('views/accordion-view.php');
}
function wst_display_header_fields(array $layout){
	include('views/header-fields-view.php');
}

