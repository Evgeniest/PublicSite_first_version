<div class="news-slider-items-main-wrapper w3-animate-right">
	<div class="news-slider-items-wrapper">
	<?php
		$title    = esc_attr( $slider_item['crb_title'] );
		$subtitle    = esc_attr( $slider_item['crb_subtitle'] );
		$content    = esc_attr( $slider_item['crb_content'] );
		$link    = esc_attr( $slider_item['crb_publication_link'] );
		$image_id = esc_attr($slider_item['crb_image']);
		$image = wp_get_attachment_image($image_id,'full');
		$date = esc_attr($slider_item['crb_date']);
	?>
		<div class="news-slider-item-flip">
			<div class="news-slider-item">
				<div class="news-slider-item-front">
					<div class="logo"><?php echo $image;?></div>
					<a href="<?php echo $link;?>" rel="nofollow"><div class="title"><?php echo $title?></div></a>
					<div class="subtitle"><?php echo $subtitle." | ".$date?></div>
				</div>
				<div class="news-slider-item-back">
					<a href="<?php echo $link;?>" rel="nofollow"><div class="title"><?php echo $title?></div></a>
					<div class="content"><?php echo $content?><a href="<?php echo $link;?>" rel="nofollow" class="read-more"> read more></a></div>
					<div class="subtitle"><?php echo $subtitle?></div>
				</div>
			</div>
		</div>
	</div>
</div>



