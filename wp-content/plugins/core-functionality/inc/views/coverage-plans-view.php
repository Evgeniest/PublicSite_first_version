<?php
$class = esc_html( $layout['crb_class'] );
$title = esc_attr( $layout['crb_title'] );
$cols  = esc_attr( $layout['crb_coverage_cols'] );
?>
<section class="section coverage-plans-section <?php echo $class; ?>">
	<hr class="above-section-title"/>
	<h2 class="section-title uk-text-center"><?php echo $title; ?></h2>
	<div class="container-900 coverage-plans-container">
		<div class="uk-grid uk-grid-width-medium-1-<?php echo $cols ?>">
			<?php wst_get_layout_items( $layout, 'crb_coverage_item', 'views/coverage-plan-item-view.php' ); ?>
		</div>
	</div>

</section>
