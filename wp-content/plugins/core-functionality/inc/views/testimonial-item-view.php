<?php
$image_id = esc_attr($item['crb_image']);
$image = wp_get_attachment_image($image_id,'full');
$content = esc_attr($item['crb_testimonial_content']);
$author = esc_attr($item['crb_testimonial_author']);
$image_class = esc_attr($item['crb_image_class']);
$content_class = esc_attr($item['crb_content_class']);

?>
<div class="testimonial-item uk-grid">
	<div class="testimonial-image uk-width-medium-2-10 <?php echo $image_class;?>">
		<?php echo $image;?>
	</div>
	<div class="testimonial-text uk-width-medium-8-10  <?php echo $content_class;?>">
		<div class="item-content">
			<?php echo $content;?>
		</div>
		<div class="testimonial-author">
			<?php echo carbon_parse_shortcodes($author);?>
		</div>
	</div>
</div>
