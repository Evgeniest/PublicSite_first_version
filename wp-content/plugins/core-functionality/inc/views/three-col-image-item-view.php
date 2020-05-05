<?php
$image_id = esc_attr($item['crb_image']);
$image = wp_get_attachment_image($image_id,'full');
$image_url = wp_get_attachment_image_url($image_id,'full');
$image_rel_url = wp_make_link_relative( $image_url );
$title = esc_attr($item['crb_three_col_image_item_title']);
$link = esc_url($item['crb_link']);
?>
<div class="uk-width-medium-1-3">
	<a href="<?php echo $link; ?>">
	<div class="three-col-image-item uk-text-center uk-panel uk-panel-box">
			<div class="uk-panel-teaser uk-cover-background"
			     style="background: url(<?php echo $image_rel_url; ?>) no-repeat;-webkit-background-size:cover ;background-size: cover; ">
		</div>
		<div class="col-image-title"><?php echo $title; ?><span class="col-image-title-arrow"></span></div>
	</div>
	</a>
</div>


