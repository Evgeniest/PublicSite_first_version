<?php
$class    = esc_html( $item['crb_coverage_class'] );
$popular  = esc_attr( $item['crb_coverage_popular'] );
$title    = esc_attr( $item['crb_coverage_title'] );
$subtitle = esc_attr( $item['crb_coverage_subtitle'] );
$content  =  $item['crb_coverage_content'];
?>
<div class="uk-panel uk-panel-box uk-text-center coverage-plan-item ">
	<div class="uk-panel-teaser <?php echo $class; if ( $popular ) echo ' teaser-popular';?>">
		<?php if ( $popular ) { ?>
			<div class="popular"><?php echo $popular; ?></div>
		<?php } ?>
		<div class="coverage-title-wrapper">
		<div class="coverage-title"><?php echo $title; ?></div>
		<div class="coverage-subtitle"><?php echo carbon_parse_shortcodes($subtitle); ?></div>
		</div>
	</div>
	<div class="coverage-content"><?php echo carbon_parse_shortcodes($content); ?></div>
</div>
