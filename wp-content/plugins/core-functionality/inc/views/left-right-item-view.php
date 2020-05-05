<?php
$image_id = esc_attr( $item['crb_image'] );
$image    = wp_get_attachment_image( $image_id, 'full' );
$title    = esc_attr( $item['crb_left_right_title'] );
$content  = esc_attr( $item['crb_left_right_content'] );
?>
<div class="left-right-item uk-grid uk-grid-width-medium-1-2">
		<div class="left-right-image <?php echo get_push_class(); ?> ">
			<?php echo $image; ?>
		</div>
		<div class="left-right-text uk-flex uk-flex-center uk-flex-column <?php echo get_pull_class(); ?> ">
			<h3 class="item-title"><?php echo $title; ?></h3>
			<div class="item-content"><?php echo $content; ?></div>
		</div>
</div>


