
<section class="section news-slider-section">
	
		
		<div class="news-slider-container desktop">
			<div class="responsive">
				<?php wst_get_new_slider_items($layout,'views/news/news-slider-item-view.php'); ?>
			</div>
		</div>
	

</section>

<section class="section news-list-section">
		
		<div class="news-list-container">
			<?php wst_get_layout_items($layout,'crb_news_item','views/news/news-list-item-view.php');?>
		</div>

</section>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.responsive').slick({
			slidesToShow: 3,
			slidesToScroll: 3,
			dots: true,
			autoplay: true,
			autoplaySpeed: 8000,
			responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
  			]
		});
	});
</script>

