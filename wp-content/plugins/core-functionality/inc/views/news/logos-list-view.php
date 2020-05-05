<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
?>
<section class="news section logos-list-section <?php echo $class; ?>">
		<h2 class="news-section-title uk-text-center"><?php echo $title; ?></h2>
		<div class="logos-list-container">
			<?php wst_get_layout_items($layout,'crb_logo_list','views/news/logos-list-item-view.php');?>
		</div>

</section>

