<div class="uk-width-medium-1-2 blog-featured-image">
	<?php beans_post_image();?>
</div>
<div class="uk-width-medium-1-2 blog-featured-content">
	<div class="post-date"><?php the_date();?></div>
	<h2 class="featured-post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	<?php the_excerpt();?>
	<div class="post-categories"><?php beans_post_meta_categories(); ?></div>
</div>
