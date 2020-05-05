<?php
$classes = esc_attr($layout['crb_class']);
$content = $layout['crb_content'];
?>
<div class=" <?php echo $classes?> ">
	<?php echo carbon_parse_shortcodes($content); ?>
</div>
