<?php
//Template name: builder page
beans_remove_attribute('beans_fixed_wrap_main','class','uk-container uk-container-center');
beans_remove_attribute('beans_post','class','uk-panel-box');
beans_remove_attribute('beans_main','class','uk-block');



add_action( 'beans_post_content_prepend_markup', 'wst_display_builder' );
function wst_display_builder() {
$layouts = carbon_get_the_post_meta( 'crb_block_layouts', 'complex' );
	foreach ( $layouts as $layout ) {
		$function_name = 'wst_display' . $layout['_type'];
		if ( function_exists( $function_name ) ) {
			call_user_func( $function_name, $layout );

		}
	}
	$link=esc_attr(carbon_get_the_post_meta('crb_quote_link'));
	?>
    <div class="getquote-link" data-value="<?php echo $link; ?>"></div>
    <?php
}

beans_load_document();