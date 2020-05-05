<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
$subtitle    = esc_attr( $layout['crb_subtitle'] );
$image_id = esc_attr( $layout['crb_image'] );
$image    = wp_get_attachment_image( $image_id, 'full' );
?>

<section class="section map-section <?php echo $class; ?>">
	<div class="uk-container uk-container-center uk-text-center">
		<hr class="above-section-title">		
		<h2 class="section-title"><?php echo $title; ?></h2>
		<div class="item-subtitle"><?php echo $subtitle; ?></div>
		<div calss="map-img"><?php echo $image;?></div>
	</div>

</section>