<?php
$title   = esc_attr( $item['crb_accordion_title'] );
$content = $item['crb_coverage_content'];
?>

<div class="accordion-item">

	<h3 class="uk-accordion-title"><div class="arrow"></div><?php echo $title; ?></h3>
	<div class="uk-accordion-content">
		<?php echo $content; ?>
	</div>
</div>


