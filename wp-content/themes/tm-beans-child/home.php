<?php
beans_add_smart_action( 'beans_header_after_markup', 'wst_blog_title_area', 99 );
beans_remove_action('beans_post_meta_tags');
beans_remove_output('beans_post_meta_categories_prefix');
function wst_blog_title_area() {
	$link=esc_attr(carbon_get_theme_option('crb_blog_quote_link'));
	?>
	<div class="getquote-link" data-value="<?php echo $link; ?>"></div>
	<div class="archive-title-area uk-text-center">
		<div class="uk-container uk-container-center blog-title"><span class="getquote" value="<?php echo carbon_get_theme_option('crb_blog_quote_link');?>"></span>
			<h1>
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="search" class="search-field" placeholder="Search articles" value="<?php echo get_search_query() ?>" name="s" />
				</form><?php echo carbon_get_theme_option('crb_blog_title');?>
			</h1>
		</div>
	</div>
<?php }

beans_add_smart_action( 'beans_header_after_markup', 'wst_featured_post_area', 100 );
function wst_featured_post_area() {
	$query = new WP_query( array(
		'category_name' => 'featured',
		'post_per_page' => 1
	) );
	if ( $query->have_posts() ) {
		echo '<div class="section featured-section uk-container uk-container-center"><div class="uk-grid">';
		while ( $query->have_posts() ) {
			$query->the_post();

			include 'views/featured-section-view.php';

		}
		echo '</div></div>';
	}
	wp_reset_postdata();
}

//Remove featured post from loop
add_filter( 'beans_loop_query_args', 'remove_featured_from_loop' );
function remove_featured_from_loop() {
	return array(
		'cat' => '-41',
		'paged' => get_query_var( 'paged') ? get_query_var( 'paged' ) : 1,
	);

}
add_action( 'pre_get_posts', 'only_posts_query' );

function only_posts_query( $query ) {

	// Modify the main query on the front end only.
	$query->set('post_type', 'post');

}

// beans_add_smart_action( 'beans_main_before_markup', 'display_subscribe_post' );

beans_load_document();