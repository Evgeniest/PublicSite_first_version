<?php
$logo_id = esc_attr($item['crb_image']);
$logo = wp_get_attachment_image($logo_id,'full');
$title = esc_attr($item['crb_logo_title']);
?>
<div class="three-logos-item uk-text-center">
	<div class="logo-image"><?php echo $logo;?></div>
	<h3 class="logo-title item-title"><?php echo $title;?></h3>
</div>
