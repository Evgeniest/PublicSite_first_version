<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
?>
<section class="about section grey-section logos-list-section <?php echo $class; ?>">
	<div class="uk-container uk-container-center">
		<hr class="above-section-title">		
		<h2 class="section-title uk-text-center"><?php echo $title; ?></h2>
		<div class="logos-list-container">
			<?php wst_get_layout_items($layout,'crb_logo_list','views/about/logos-list-item-view.php');?>
		</div>
	</div>

</section>

