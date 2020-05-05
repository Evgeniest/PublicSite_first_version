<?php
$image_id = esc_attr(carbon_get_the_post_meta('crb_hero_image'));
$slider_desktop = esc_attr(carbon_get_the_post_meta('crb_hero_slider_desktop'));
$slider_mobile = esc_attr(carbon_get_the_post_meta('crb_hero_slider_mobile'));
$image_url = esc_url(wp_get_attachment_image_url($image_id,'full'));
$heading = esc_attr(carbon_get_the_post_meta('crb_hero_heading'));
$subtitle = esc_attr(carbon_get_the_post_meta('crb_hero_subtitle'));
$small_text = esc_attr(carbon_get_the_post_meta('crb_hero_small_text'));
$small_quote = esc_attr(carbon_get_the_post_meta('crb_hero_small_quote'));
$small_button_color = esc_attr(carbon_get_the_post_meta('crb_hero_button_color'));
$crb_hero_retrieve_quote_text = esc_attr(carbon_get_the_post_meta('crb_hero_retrieve_quote_text'));
$crb_hero_retrieve_quote_link = esc_url(carbon_get_the_post_meta('crb_hero_retrieve_quote_link'));
$crb_hero_retrieve_quote_color = esc_attr(carbon_get_the_post_meta('crb_hero_retrieve_quote_color'));
error_log('xx');

$link = esc_url(carbon_get_the_post_meta('crb_quote_link'));
if(!$image_id && !$slider_desktop && !$slider_mobile){
	return;
}

?>
<div class="tm-hero-area <?php if(!($slider_mobile || $slider_desktop)) echo 'no-slider';  ?> uk-text-center uk-flex uk-flex-center uk-flex-middle uk-flex-column <?php if ($slider) echo 'slider'?>"
     style = "background: url(<?php echo $image_url?>)no-repeat center center;
	     -webkit-background-size:cover ;background-size: cover;
	     ">
 	<?php if($slider_desktop){?>
 		<div class="tm-hero-slider tm-hero-slider-desktop">
			<?php echo do_shortcode("[metaslider id=" . $slider_desktop . "]");  ?>
		</div>
	<?php }?>
	<?php if($slider_mobile){?>
 		<div class="tm-hero-slider tm-hero-slider-mobile">
			<?php echo do_shortcode("[metaslider id=" . $slider_mobile . "]");  ?>
		</div>
	<?php }?>
	<div class="tm-hero-content ">
		<?php if($heading){?>
			<h1 class="tm-hero-heading uk-heading-large">
				<?php echo $heading; ?>
			</h1>
		<?php }?>
		<?php if($subtitle){?>
			<h2 class="tm-hero-subtitle">
				<?php echo $subtitle; ?>
			</h2>
		<?php }?>
		<?php if($link){?>
			<a href="<?php echo $link?>"
			   class="uk-button tm-hero-button" style="min-width: 220px; <?php if($small_button_color) echo 'background-color:' . $small_button_color; ?>"><?php if($small_quote) echo $small_quote; else echo 'Get instant quote';?></a>
		<?php }?>
		<?php if($crb_hero_retrieve_quote_link){?>
			<a class="tm-hero-link white-arrow" href="<?php echo $crb_hero_retrieve_quote_link?>" style="color:<?php echo $crb_hero_retrieve_quote_color;?>"><?php echo $crb_hero_retrieve_quote_text; ?></a>
		<?php }?>
		<!--
		<h3 class="tm-hero-small-text"><?php echo $small_text; ?></h3>
		-->
	</div>
</div>	

