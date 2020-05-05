<?php
$class = esc_html( $layout['crb_class'] );
$title = esc_attr( $layout['crb_title'] );
?>
<section class="section testimonials-section <?php echo $class;?>">
	<hr class="above-section-title">

<h2 class="section-title uk-text-center"><?php echo $title;?></h2>
	<div class="testimonials-container container-900 uk-container-center">
		<?php wst_get_layout_items( $layout, 'testimonial_item', 'views/testimonial-item-view.php' ); ?>
	</div>
</section>
