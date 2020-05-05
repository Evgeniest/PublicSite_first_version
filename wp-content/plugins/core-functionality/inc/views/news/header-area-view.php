<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
$subtitle    = esc_attr( $layout['crb_subtitle'] );
$image_id = esc_attr( $layout['crb_image'] );
$image_id_mobile = esc_attr( $layout['crb_header_image_mobile'] );
$image    = wp_get_attachment_image( $image_id, 'full' );
$image_mobile   = wp_get_attachment_image( $image_id_mobile, 'full' );
?>
<section class="news header-area-section <?php echo $class; ?>">
	
	<div class="header-area-img desktop"><?php echo $image; ?></div>
	<div class="header-area-img mobile"><?php echo $image_mobile; ?></div>
	<div class="header-area-content uk-text-center">
		<div class="header-area-title"><?php echo $title; ?></div>
		<div class="header-area-subtitle"><?php echo $subtitle; ?></div>
	</div>
</section>