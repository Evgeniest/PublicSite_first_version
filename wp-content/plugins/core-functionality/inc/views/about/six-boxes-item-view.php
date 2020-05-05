<?php
$image_id = esc_attr($item['crb_image']);
$image_url = wp_get_attachment_image_url($image_id,'full');
$title = esc_attr($item['crb_title']);
$subtitle = esc_attr($item['crb_subtitle']);
$color = esc_attr($item['crb_six_box_color']);

$background_image_style = $image_url ? 'background: url('.  $image_url . ') no-repeat center center; 
	     -webkit-background-size:cover ;background-size: cover;' : '';
$background_color_style = $color ? 'background-color: ' . $color . ';': '';
?>

<div class="six-box-item uk-text-center" style="<?php echo  $background_image_style . $background_color_style;?>">
	<div>
	<div class="six-box-section-title"><?php echo $title;?></div>
	<div class="six-box-section-subtitle"><?php echo $subtitle;?></div>
	</div>

</div>
