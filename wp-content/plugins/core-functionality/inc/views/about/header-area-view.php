<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
$image_id = esc_attr( $layout['crb_image'] );
$image    = wp_get_attachment_image( $image_id, 'full' );
?>
<section class="about-us header-area-section <?php echo $class; ?>">

	<div class="header-area-img"><?php echo $image; ?></div>
	<div class="header-area-title"><?php echo $title; ?></div>
</section>