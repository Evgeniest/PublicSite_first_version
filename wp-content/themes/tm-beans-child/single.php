<?php
beans_add_attribute('beans_post_body', 'class', 'post-body');
beans_add_attribute('beans_post_meta_tags', 'class', 'post-tags');
//beans_remove_action('beans_post_navigation');
remove_action('beans_post_header', 'beans_post_title');
//remove_action( 'beans_primary_menu_append_markup' , 'example_primary_menu_toggle' );
//beans_remove_markup( 'beans_primary_menu' );
//beans_remove_output( 'beans_primary_menu' );
beans_remove_action( 'header_search' );
beans_remove_action( 'beans_post_image' );
//beans_remove_action( 'beans_comment_form');
//beans_remove_action( 'beans_post_meta_item_comments_text_output');
beans_remove_action('beans_comments_template');
beans_add_smart_action( 'beans_content_prepend_markup', 'wst_display_blog_menu_search' );

beans_add_smart_action( 'beans_main_after_markup', 'display_subscribe_mail' );

beans_modify_action_callback('beans_post_content', 'display_single_post');

function display_single_post(){
	?>
	<div id="post_begin" class ="single-post-layout">
	<div class="post-content-wrapper">
		<?php beans_post_image(); ?>
		<div class="single-post">
		<h1 class="post-title"><?php the_title();?></h1>
		<div class="post-meta-details-top">
			<div class="post-meta-details-section-1">
			<div class="post-date-author"><span class="author"><?php  the_author();?></span> | <span class="date"><?php  the_date();?></span></div>
			<div class="post-tags">
			<?php //the_category(' '); ?>
			</div>
			<div class="post-comments">
			<?php $num_comments = get_comments_number();
			      if( $num_comments != 0){ ?>
				  <a href="<?php echo get_comments_link(); ?>">
				  	<div class="comment-icon"></div>
			  		<div class="comments-num"> <?php echo $num_comments; ?></div>
				  </a>
				<?php } ?>
			</div>
			</div>
			<div class="post-meta-details-section-2">
			<div class="share-buttons"><?php display_share_buttons();?></div>
			</div>
		</div>
		<div class="post-body"><?php the_content();?></div>
		<div class="post-meta-details-bottom">
			<div class="post-tags"><?php the_tags('',' '); ?></div>
			<div class="share-buttons"><?php display_share_buttons();?></div>
		</div>  
		<?php 
		display_author();
		 ?>
		<a href="#post_begin"><div class="single-arrow"></div></a>
		</div> <!-- single-post class */   -->
		<?php display_latest_posts();
			//comments_template();
		global $wp_query;

        global $post;
        $post_id = $wp_query->post->ID;
		display_comments($post_id);

		$comment_form_args = array(
  		'id_form'           => 'commentform');
		comment_form($comment_form_args, $post_id);
		 ?>
	</div>   <!-- post-content-wrapper class */   -->
	<div class="post-sidebar-wrapper">
		<?php display_follow_us();
		      display_recommended_posts();
			  display_authors();
		 ?>
		</div>
	</div>
     <!-- post-comments-wrapper -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
    jQuery("#submit").click(function(e){
            var data_2;
        jQuery.ajax({
                    type: "POST",
                    url: "<?php echo get_site_url(); ?>/wp-content/themes/tm-beans-child/ReCapcha.php",
                    data: jQuery('#commentform').serialize(),
                    async:false,
                    success: function(data) {
                     if(data.nocaptcha==="true") {
                   data_2=1;
                      } else if(data.spam==="true") {
                   data_2=1;
                      } else {
                   data_2=0;
                      }
                    }
                });
                if(data_2!=0) {
                  e.preventDefault();
                  if(data_2==1) {
                    alert("Please check the captcha");
                    grecaptcha.reset();
                  } else {
                    alert("Captcha validation failed please try again");
                    grecaptcha.reset();
                  }
                } else {
                    jQuery("#commentform").submit
               }
      });
    </script>
<?php	
}


function display_latest_posts() {  ?>
	<div class="latest-posts-wrapper">
		<?php
	global $post;
	$args = array(
	  'numberposts' => 3,
	  'post_type'   => 'post',
	  'exclude'     => get_the_ID()
	); 
	$latest_posts = get_posts( $args );
	if ( $latest_posts ) {
		?>
		<div class="latest-posts-title">LATEST POSTS</div>
		<div class="latest-posts">
		<?php 
	    foreach ( $latest_posts as $post ){
	    	setup_postdata( $post );	        
	    	include 'views/post-in-blog-view.php';
	    }
		echo '</div>';
	}
	
	echo '</div>';
}

function display_recommended_posts(){
	$posts_ids = carbon_get_theme_option( 'crb_recommended_posts', 'complex' );

	?>
	<div class="recommended-posts-wrapper">
	<div class="recommended-posts-title">RECOMMENDED POSTS</div>
	<?php foreach ($posts_ids as $post_id) {
		$id = $post_id['crb_recommended_post_id'];
		$title = get_the_title($id);
		$link = get_permalink($id);

		?>
		<div class="recommended-item"><a href="<?php echo $link;?>"><?php echo $title;?></a></div>
	<?php } ?>
	</div>
<?php
}

function display_share_buttons(){
	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
	$text  = get_the_title();
	?>
	<div class="share-links"><span>Share</span>
		<div class="fb-share">
			<a rel="nofollow" href="https://www.facebook.com/share.php?u=<?php echo $current_url;?>" target="_blank"></a>
		</div>
		<div class="twitter-share">
			<a rel="nofollow" href="https://twitter.com/share?original_referer=/&text=<?php echo $text;?>&url=<?php echo $current_url;?>" target="_blank"></a>
		</div>
		<div class="in-share">
			<a rel="nofollow" href="https://www.linkedin.com/cws/share?url=<?php echo $current_url;?>" target="_blank"></a>
		</div>
	</div>
	<?php
	
}

function display_author(){
		$author_id = get_queried_object()->post_author;
		$user_data = get_userdata($author_id);
		 ?>
		<div class="single-post-author-wrapper">
		<div class="single-post-author-avatar"><?php echo get_avatar($author_id); ?></div>
		<div class="single-post-author-wrapper-name">
		<div class="single-post-author-name"><?php echo $user_data->display_name . " | " . implode(', ', $user_data->roles);?></div>
		<div class="single-post-author-description"><?php echo the_author_meta('description');?></div>
		</div>
	</div> <?php
}

function display_comments($id){

	
	
			
	//echo "<script> console.log('PHP: ',$post_id);</script>";
		$args = array(
		'status' => 'approve',
		'post_id' => $id);

 	$comments = get_comments($args);
	 if( !$comments){
		 return;
	 }
	 ?>
	 	<div id="comments" class="post-comments-wrapper">
		<?php

		//Display the list of comments
		wp_list_comments(array(
			'per_page' => 10, //Allow comment pagination
		), $comments); ?></div>  
	 <?php

/*
	foreach($comments as $comment){ 
		?>
		<div class="single-post-comment">
			<div class="comment-author-avatar"> <?php echo get_avatar($comment->user_id); ?> </div>
			<div class="comment-desc">
				<div class="comment-author-name">
					<?php
					$user_meta  = get_userdata($comment->user_id);
					$roles = implode(', ', $user_meta->roles);
					echo($comment->comment_author . ' | ' . $roles); ?>
					</div> <!-- comment-author-name -->
					<div class="comment-text"><?php echo $comment->comment_content; ?></div>
					<div class="comment-links"></div>
		</div> <!-- comment-desc -->
		</div> <!-- single-post-comment -->
	<?php
	 } */ ?>
     <!-- post-comments-wrapper -->
	<?php 
//	wp_reset_postdata(); 
}
beans_load_document();

