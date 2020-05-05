<?php
//Side-posts

add_shortcode('display-posts','wst_display_posts');
function wst_display_posts($attributes){
	$default = array(
		'id' => '',
		'name'=> '',
	);
	$attributes = shortcode_atts( $default, $attributes, 'display-posts' );
	$html ='';
	$query = wst_get_post_records($attributes);

	if ( ! $query->have_posts() ) {
		return '';
	}
	ob_start();

	while ( $query->have_posts() ) {
		$query->the_post();
		add_filter( 'beans_edit_post_image_args', 'wst_resize_related_image' );
		function wst_resize_related_image() {
			return array(
				'resize' => array( 500, 300, true ),
			);
		}

		include( 'views/post-view.php' );

	}
	$html .= ob_get_clean();

	wp_reset_postdata();

	return $html;
}
function wst_get_post_records(array $attributes){
	$args = array(
		'post_type'=>'any',
		'p'         => $attributes['id'],
		'name'      => sanitize_text_field( $attributes['name'] ),
	);
	$records = new WP_query( $args );

	return $records;
}