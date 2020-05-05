
<?php
beans_modify_action_callback( 'beans_loop_template', 'posts_search_loop' );
function posts_search_loop() {
	
    echo beans_open_markup('search-content', 'div', array( 'class' => 'search-content' ));

	echo beans_open_markup('posts-list', 'div', array( 'class' => 'posts-list' ));
	

    if ( have_posts() && !is_404() ){
		echo beans_open_markup('search-title', 'div', array( 'class' => 'search-title' ));
		echo 'Search Results '?><span><?php echo '"'.get_search_query().'"'; ?></span>
		<?php
		echo beans_close_markup( 'search_title', 'div' );
		while ( have_posts() ) {
			the_post(); 
			include 'views/post-in-blog-view.php';
		}
	} 
    else{ ?>
		<div class="no-result-wrapper">
			<div class="no-result-image"></div>
			<?php
			echo beans_open_markup('search-title', 'div', array( 'class' => 'search-title' ));
			echo 'Sorry, but we cannot find the expression '?><span><?php echo '"'.get_search_query().'"'; ?></span>
		<?php
		echo beans_close_markup( 'search_title', 'div' ); ?>
        <div class="no-result-link"><a href="/blog">you can go back to homepage blog</a></div>
		</div>
	<?php  } 

    // Display posts pagination.
    beans_posts_pagination();
	echo beans_close_markup( 'posts-list', 'div' );

	wst_display_follow_us_authors();
	echo beans_close_markup( 'search-content', 'div' );

}


beans_remove_attribute('beans_fixed_wrap_main','class','uk-container uk-container-center');
beans_remove_action( 'beans_post_meta_tags' );
beans_remove_action( 'beans_post_title' );
beans_remove_action( 'beans_post_image' );
remove_action( 'beans_primary_menu_append_markup' , 'example_primary_menu_toggle' );
beans_remove_markup( 'beans_primary_menu' );
beans_remove_output( 'beans_primary_menu' );
beans_remove_action( 'header_search' );
beans_add_smart_action( 'beans_content_prepend_markup', 'wst_display_blog_menu_search' );
beans_add_smart_action( 'beans_main_after_markup', 'display_subscribe_mail' );  

  beans_load_document();
	?>


