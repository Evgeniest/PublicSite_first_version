<?php
//Template name: blog page
beans_remove_attribute('beans_fixed_wrap_main','class','uk-container uk-container-center');
beans_remove_attribute('beans_post','class','uk-panel-box');
beans_remove_attribute('beans_main','class','uk-block');
//remove_action( 'beans_primary_menu_append_markup' , 'example_primary_menu_toggle' );
//beans_remove_markup( 'beans_primary_menu' );
//beans_remove_output( 'beans_primary_menu' );
beans_remove_action( 'header_search' );


beans_add_smart_action( 'beans_main_prepend_markup', 'wst_blog_title_area', 99 );
function wst_blog_title_area() {
  $link=esc_attr(carbon_get_theme_option('crb_blog_quote_link'));
  ?>
  <div class="getquote-link" data-value="<?php echo $link; ?>"></div>
  <div class="blog-header-area uk-text-center">
    <?php echo do_shortcode("[recent_post_slider category='41'
		 autoplay_interval='8000' 
		 show_category_name='false' 
		 show_date='false' 
		 arrows='false'
		 show_author='false']");  ?>
  </div>
<?php }

beans_add_smart_action( 'beans_content_prepend_markup', 'wst_display_blog_menu_search', 100 );
//beans_post_content_prepend_markup
beans_add_smart_action( 'beans_content_prepend_markup', 'wst_open_markup', 101 );

function wst_open_markup(){
  echo beans_open_markup( 'wrapper-content', 'div', array( 'class' => 'wrapper-content' ) );
}

beans_add_smart_action( 'beans_content_prepend_markup', 'blog_posts', 102);
beans_add_smart_action( 'beans_content_prepend_markup', 'wst_display_follow_us_authors', 103);


function blog_posts() {
  global $wp_query;

  echo beans_open_markup('wrapper-posts', 'div', array( 'class' => 'wrapper-posts' ));

  $category_id = esc_attr(carbon_get_theme_option('crb_blog_category'));
  $index = esc_attr(carbon_get_theme_option('crb_blog_index'));

  $paged = get_query_var( 'paged', 1 );

  $tmp_wp_query = $wp_query;

  $wp_query = new WP_query( array(
      'category'  => $category_id,
      'paged'     => $paged,
      'post_type' => 'post',
      'posts_per_page' => $index
  ) );

  if ( $wp_query->have_posts() ) {
    while ( $wp_query->have_posts() ) {
      $wp_query->the_post();
      include 'views/post-in-blog-view.php';

    }
  }
  wp_reset_postdata();

  echo '<div style="clear:both;display: block;width: 100%;"></div>';

  beans_posts_pagination();

  $wp_query = $tmp_wp_query;

  echo beans_close_markup( 'wrapper-posts', 'div' );

}
beans_add_smart_action( 'beans_content_prepend_markup', 'wst_close_markup', 104 );

function wst_close_markup(){
  echo beans_close_markup( 'wrapper-content', 'div' );
}
/*
beans_add_smart_action( 'beans_post_content_prepend_markup', 'wst_display_search', 100 );
//beans_add_smart_action( 'beans_post_content_prepend_markup', 'wst_display_blog_menu_search', 100 );


function wst_display_search() { ?>
	<?php echo beans_open_markup('wrapper-search_tabs', 'div', array( 'class' => 'wrapper-search-tabs' ) ); ?>

	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
		<i class="fa fa-search" aria-hidden="true"></i>
		<input type="search" class="search-field" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" />
	</form>
<?php }

// beans_add_smart_action( 'beans_post_content_prepend_markup', 'wst_tabbed_post_area', 101 );
function wst_tabbed_post_area() {
	echo beans_open_markup('wrapper-tabbed-posts', 'div', array( 'class' => 'wrapper-tabbed-posts' ));
	$category_id = esc_attr(carbon_get_theme_option('crb_blog_category'));
	$open = isset($_GET['category']) && $_GET['category'] == 'last-posts' ? ' open="yes"' : '' ;
	echo do_shortcode('[tabby title="Last posts"'. $open.']');
	$index = esc_attr(carbon_get_theme_option('crb_blog_index'));
	$i = 0;
	
 	$query = new WP_query( array(
		'post_per_page' => 1,
	  	'cat'           => $category_id,
		'post_type'     => 'post'
	) );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() && $i < $index) {
			$i = $i++;
			$query->the_post();

			include 'views/post-in-blog-view.php';

		}
	}
	wp_reset_postdata();
	$args = array('child_of' => $category_id);
	$categories = get_categories( $args );
	foreach ($categories as $category) {
		$open = isset($_GET['category']) && $_GET['category'] == $category->name ? ' open="yes"' : '' ;
		echo do_shortcode('[tabby title="' . $category->name . '"' . $open .']');
		$query = new WP_query( array(
			'category_name' => $category->name,
			'post_per_page' => 1,
			'post_type'=> 'post'
		) );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				include 'views/post-in-blog-view.php';

			}
		}
		wp_reset_postdata();		
	}
	
	echo do_shortcode('[tabbyending]');
   // wst_display_follow_us_authors();
	echo beans_close_markup( 'wrapper-tabbed-posts', 'div' );
	
	
}  

beans_add_smart_action( 'beans_post_content_prepend_markup', 'wst_close_markup', 103 );

function wst_close_markup(){
	echo beans_close_markup( 'wrapper-search_tabs', 'div' );
}
*/
beans_add_smart_action( 'beans_main_after_markup', 'display_subscribe_mail' );

beans_load_document();
?>
