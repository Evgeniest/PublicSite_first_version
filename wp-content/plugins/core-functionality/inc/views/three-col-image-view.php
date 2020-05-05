<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
$subtitle = esc_attr( $layout['crb_subtitle'] );
?>
<section class="section three-col-image-section <?php echo $class; ?>">
	<div class="uk-container uk-container-center uk-text-center">
		<hr class="above-section-title">		
		<h2 class="section-title"><?php echo $title; ?></h2>
		<div class="item-subtitle"><?php echo $subtitle; ?></div>
		<div class="three-col-image-container container-900 uk-grid uk-grid-medium">
			<?php wst_get_layout_items( $layout, 'crb_three_col_image_item', 'views/three-col-image-item-view.php' ); ?>
		</div>
	</div>

</section>

