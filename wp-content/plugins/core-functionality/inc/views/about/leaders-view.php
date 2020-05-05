<?php
$class = esc_html($layout['crb_class']);
$title = esc_attr($layout['crb_title']);

?>
<section class="section leaders-section <?php echo $class;?>">
	<div class="uk-container uk-container-center ">
		<hr class="above-section-title"/>
		<h2 class="section-title uk-text-center"><?php echo $title;?></h2>
		<div class="leaders-container container-900 uk-grid uk-grid-width-medium-1-3">
			<?php wst_get_layout_items($layout,'crb_leaders','views/about/leaders-item-view.php');?>
		</div>
	</div>

</section>