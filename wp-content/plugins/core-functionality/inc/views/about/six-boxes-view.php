<?php
$class = esc_html( $layout['crb_class'] );
?>
<section class="six-boxes-section <?php echo $class; ?>">		
	<?php wst_get_layout_items($layout,'crb_six_box','views/about/six-boxes-item-view.php');?>

</section>

