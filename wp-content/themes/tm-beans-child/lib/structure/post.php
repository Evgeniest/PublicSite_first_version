<?php

beans_add_smart_action( 'wp', 'wst_set_up_post_structure' );
function wst_set_up_post_structure() {
	//Remove title only on pages
	if ( is_page() ) {
		beans_remove_action( 'beans_post_title' );
	}

	add_filter( 'beans_edit_post_image_args', 'wst_resize_featured_image' );
	function wst_resize_featured_image() {
		if(is_singular()){
			return;
		}
		return array(
			'resize' => array( 500, 300, true ),
//		'set_quality' => array( 60 )
		);
	}

	add_filter( 'the_content', 'wst_modify_post_content' );

	function wst_modify_post_content( $content ) {

		// Stop here if we are on a single view.
		if ( is_singular() ) {
			return $content;
		}

		// Return the excerpt() if it exists other truncate.
//		if ( has_excerpt() ) {
//			$content = '<p>' . get_the_excerpt() . '</p>';
//		} else {
			$content = '<div class="post-excerpt">' . wp_trim_words( get_the_content(), 30, '...' ) . '</div>';
//		}

		// Return content and readmore.
		return $content . '<div class="more-link">' . beans_post_more_link() . '</div>';

	}
	add_filter( 'beans_post_more_link_text_output', 'example_modify_read_more' );

	function example_modify_read_more() {

		return 'Read More';

	}
	beans_remove_action( 'beans_post_meta' );
	beans_remove_action( 'beans_post_meta_categories' );
	if ( is_home() || is_category() ) {

		//Add grid.
//		if ( is_paged() ) {
//			beans_wrap_inner_markup( 'beans_content', 'beans_child_posts_grid', 'div', array(
//				'class' => 'uk-grid'
//			) );
//		}
		beans_wrap_markup( 'beans_post', 'beans_child_post_grid_column', 'div', array(
			'class' => 'post-wrap uk-width-large-1-3 uk-width-medium-1-2'
		) );
	}

}
