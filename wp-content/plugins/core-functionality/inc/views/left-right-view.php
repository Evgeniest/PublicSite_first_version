<?php
$class = esc_html( $layout['crb_class'] );
$title = esc_attr( $layout['crb_title'] );
?>
<section class="section left-right-section <?php echo $class ?>">
	<div class="left-right-container uk-container-center">
		<hr class="above-section-title">		
		<h2 class="section-title uk-text-center"><?php echo $title; ?></h2>
		<div class="left-right-container container-900">
			<?php wst_get_layout_items( $layout, 'crb_left_right_item', 'views/left-right-item-view.php' ); ?>
		</div>
	</div>

</section>
