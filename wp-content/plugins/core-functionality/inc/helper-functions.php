<?php
function wst_get_complex_field_group($group_view_path){
	include($group_view_path);
}



/**
 * wrapper to carbon_get_term_meta to get the term id easily
 *
 * @since 1.0.0
 *
 * @param string $taxonomy
 * @param $field_name
 *
 * @return mixed
 */
function carbon_get_the_term_meta( $taxonomy = 'category', $field_name ) {
	$term = get_query_var( $taxonomy );
	$term = get_term_by( 'slug', $term, $taxonomy );
	return carbon_get_term_meta( $term->term_id, $field_name );
}


/**
 * get items from complex fields inside a layout
 *
 * @since 1.0.0
 *
 * @param array $layout array of available layouts
 * @param $item_field name of the item field
 * @param $item_view_path path to the view from here
 *
 * @return void
 */
function wst_get_layout_items(array $layout, $item_field, $item_view_path){
	$items = $layout[$item_field];
	if(!$items){
		return;
	}
	if($item_field == 'crb_news_item'){
		usort($items, function($a, $b) {
		//	print $a['crb_date'] . ' ';
		    return strtotime($b['crb_date']) - strtotime($a['crb_date']);
		});
	}
	foreach ( $items as $item ) {
		include($item_view_path);
	}
}

function wst_get_news_for_slider(array $layout, $item_field){
	$items = $layout[$item_field];
	$slider_items = array();
	foreach ( $items as $item ) {
		if($item['crb_show_on_slider'] == 1){
			$slider_items[] = $item;
		}
	}
	return $slider_items;
}
function wst_get_new_slider_items($layout, $item_view_path){
	$items = wst_get_news_for_slider($layout,'crb_news_item');
	foreach ( $items as $slider_item) {
		include($item_view_path);
	}
	return sizeof($items);
}
/**
 * Display the dotnav in simple sliders
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_dotnav_items_simple( $item_field) {
	$slides       = carbon_get_the_post_meta($item_field,'complex');
	$total_nb_of_slides = count( $slides );
	for ( $nb_of_slides = 0; $nb_of_slides < $total_nb_of_slides; $nb_of_slides ++ ) : ?>
		<li data-uk-slideshow-item="<?php echo (int) $nb_of_slides; ?>"><a href="#"></a></li>
	<?php endfor;
}
/**
 * add the wp editor functions to rich_text custom field
 */

function carbon_parse_shortcodes($meta_string){
	return apply_filters('the_content', $meta_string);
}


/**
 * Retrieve parameters from attachments
 *
 * @since 1.0.0
 *
 * @param $attachment_id
 *
 * @return array
 */
function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );

	return array(
		'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href'         => get_permalink( $attachment->ID ),
		'src'         => $attachment->guid,
		'title'       => $attachment->post_title
	);
}

function get_push_class($number_of_columns = 2){
	static $count = 0;
	$remainder = $count % $number_of_columns;
	$count++;
if($remainder == 0) {
	return 'uk-push-1-2';
	}
}
function get_pull_class($number_of_columns = 2){
	static $count = 0;
	$remainder = $count % $number_of_columns;
	$count++;
	if($remainder == 0) {
		return 'uk-pull-1-2';
	}
}
function get_push_8_class($number_of_columns = 2){
	static $count = 0;
	$remainder = $count % $number_of_columns;
	$count++;
	if($remainder == 1) {
		return 'uk-push-8-10';
	}

}
function get_pull_2_class($number_of_columns = 2){
	static $count = 0;
	$remainder = $count % $number_of_columns;
	$count++;
	if($remainder == 1) {
		return 'uk-pull-2-10';
	}
}

function get_push_pull_class($class, $number_of_columns = 2){
	static $count = 0;
	$remainder = $count % $number_of_columns;
	$count++;
	if($remainder == 0) {
		return $class;
	}
}