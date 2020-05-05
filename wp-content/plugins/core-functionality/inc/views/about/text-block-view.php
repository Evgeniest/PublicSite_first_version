<?php
$class    = esc_html( $layout['crb_class'] );
$title    = esc_attr( $layout['crb_title'] );
$content = esc_attr( $layout['crb_text_block_content'] );
?>
<section class="section text-block-section <?php echo $class; ?>">
	<div class="uk-container uk-container-center">
		<hr class="above-section-title">		
		<h2 class="section-title uk-text-center"><?php echo $title; ?></h2>
		<div class="item-content uk-text-left"><?php echo wpautop($content); ?></div>
	</div>

</section>

