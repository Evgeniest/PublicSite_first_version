<?php
$class = esc_html($layout['crb_class']);
$title = esc_attr($layout['crb_title']);
$subtitle = esc_attr($layout['crb_subtitle']);

?>
<section class="section three-logos-section <?php echo $class;?>">
	<div class="uk-container uk-container-center uk-text-center">
		<hr class="above-section-title"/>
		<h2 class="section-title"><?php echo $title;?></h2>
		<h3 class="three-logos-subtitle uk-container-center"><?php echo $subtitle;?></h3>
		<div class="three-logos-container container-900 uk-grid uk-grid-width-medium-1-3">
			<?php wst_get_layout_items($layout,'crb_logo_item','views/three-logos-item-view.php');?>
		</div>
	</div>

</section>