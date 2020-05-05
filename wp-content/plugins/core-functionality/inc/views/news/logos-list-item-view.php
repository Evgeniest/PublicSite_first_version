<?php
$image_id = esc_attr($item['crb_image']);
$image = wp_get_attachment_image($image_id,'full');
?>

<div class="logo-list-item">
	<?php echo $image?>
</div>