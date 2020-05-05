<?php
$class = esc_html( $layout['crb_class'] );
$title = esc_attr( $layout['crb_title'] );
?>
<div class="section accordion-section">
	<h3 class="item-title uk-text-center <?php echo $class; ?>"><?php echo $title; ?></h3>
	<div class="container-900">
		<div class="uk-accordion"
		     data-uk-accordion="{collapse: false, showfirst: false}">
			<?php wst_get_layout_items( $layout, 'crb_accordion_item', 'views/accordion-item-view.php' ); ?>
		</div>
	</div>
</div>
