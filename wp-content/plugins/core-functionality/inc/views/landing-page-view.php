<?php
$title    = esc_attr( $item['crb_title'] );
$subtitle    = esc_attr( $item['crb_subtitle'] );
$image_id = esc_attr($item['crb_background_image']);
$background_image_url = wp_get_attachment_image_url($image_id,'full');

?>

<div class="landing-page-container" style="background-image: url(" <?php echo $background_image_url?>")">
	<div class="landing-page-title"><?php echo $title?></div>
    <div class="landing-page-subtitle"><?php echo $subtitle?></div>
	<div class="landing-page-form">form</div>
</div>