<?php
beans_add_smart_action('wp','wst_set_up_footer_structure');
function wst_set_up_footer_structure(){
	beans_wrap_markup( 'beans_footer', 'beans_footer_wrapper', 'div', array( 'class' => 'tm-footer-wrapper' ) );

	//FAT FOOTER
	// beans_add_smart_action( 'beans_footer_wrapper_prepend_markup', 'wst_display_fat_footer' );
	function wst_display_fat_footer() {
		?>
		<div class="tm-fat-footer uk-text-center">
			<div>
				<?php echo beans_widget_area( 'fat-footer' ); ?>
			</div>
		</div>

	<?php }

	// 10.1 Overwrite the Footer content

	beans_modify_action_callback( 'beans_footer_content', 'beans_child_footer_content' );

	function beans_child_footer_content() {
		include ('views/footer-view.php');
	}
	beans_remove_attribute('beans_footer','class','uk-block');
}