<?php
$title    = esc_attr( $item['crb_title'] );
$subtitle    = esc_attr( $item['crb_subtitle'] );
$content    = esc_attr( $item['crb_content'] );
$link    = esc_attr( $item['crb_publication_link'] );
$image_id = esc_attr($item['crb_image']);
$image = wp_get_attachment_image($image_id,'full');
$date = esc_attr($item['crb_date']);
?>

<div class="news-list-item">
	<div class="news-logo"><?php echo $image?></div>
	<div class="news-details">
		<a href="<?php echo $link;?>" rel="nofollow"><div class="title"><?php echo $title?></div></a>
		<div class="subtitle"><?php echo $subtitle." | ".$date?></div>		
		<div class="content"><?php echo $content?></div>		
		<a href="<?php echo $link;?>" rel="nofollow" class="read-more">read more></a>
	</div>
	
</div>


