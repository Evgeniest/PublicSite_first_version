<?php

include_once( 'lib/init.php' );

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

include_once( 'lib/functions/autoload.php' );

function display_subscribe_post() {
    ?>
    <div class='insert-element subscribe-form'>
        <h3>Subscribe</h3>
        <form action="">
            <input type="text" class="subscribe" name="subscribe">
        </form>
    </div>
    <?php
}
function display_follow_us() {
	$fb = carbon_get_theme_option( 'crb_footer_support_fb' );
	$twitter = carbon_get_theme_option( 'crb_footer_support_twitter' );
	$youtube = carbon_get_theme_option( 'crb_footer_support_youtube' );
	$linkedin = carbon_get_theme_option( 'crb_footer_support_linkedin' );
	$google = carbon_get_theme_option( 'crb_footer_support_google' );
	$in = carbon_get_theme_option( 'crb_footer_support_in' );?>
		<div class="followus-icons">
			<div class="support-title">FOLLOW US</div>
			<div class="follow-social">
			<?php if($fb) { ?><a class="icon fb" target="_blank" href="<?php echo $fb; ?>"></a><?php }?>
			<?php if($twitter) { ?><a class="icon twitter"  target="_blank" href="<?php echo $twitter; ?>"></a><?php }?>
			<?php if($linkedin) { ?><a class="icon linkedin"  target="_blank" href="<?php echo $linkedin; ?>"></a><?php }?>
			<?php if($youtube) { ?><a class="icon youtube" target="_blank"  href="<?php echo $youtube; ?>"></a><?php }?>
			<?php if($google) { ?><a class="icon google" target="_blank" href="<?php echo $google; ?>"></a><?php }?>
			<?php if($in) { ?><a class="icon in" target="_blank" href="<?php echo $in; ?>"></a><?php }?>
			</div>
		</div>
	<?php
}

function front_page_header_search(){ 
		if( !is_front_page()){
			return;
		}
		header_search();
}

function header_search(){ 
	?>

		<div class="header-search-form">
			<div class="search-title"><span class="uk-icon-search"></span>
			<span class="search-title-text"> search</span></div>
			<div class="search-field-wrapper">
			<form role="search" method="get" class="search-form-frame" action="<?php echo esc_url( home_url( '/' ) ) ?>">
				<input type="search" class="search-field" placeholder="search" value="<?php echo get_search_query() ?>" name="s"/>
			</form>
			</div>
		</div> <?php
}

function my_posts_groupby($groupby) {
    global $wpdb;
    $groupby = "{$wpdb->posts}.post_author";
    return $groupby;
}

function display_authors(){
  global $post;
	$authors = array();
	$category_id = esc_attr(carbon_get_theme_option('crb_blog_category'));


  add_filter( 'posts_groupby', 'my_posts_groupby' );

	$query = new WP_query( array(
		'posts_per_page' => -1,
	  'category'      => $category_id
	) );

	remove_filter( 'posts_groupby', 'my_posts_groupby' );

	while ( $query->have_posts()) {
		$query->the_post();
		$authors [get_the_author_meta('ID')] = get_the_author();
	}

	//sorting the author array by value
	uasort($authors, "str_cmp_func");

	wp_reset_postdata();
?>
	<div class="author-section">
	<div class="authors-title">AUTHORS</div>
	<?php
	foreach ($authors as $author_id => $author) {
		$user_meta  = get_userdata($author_id);
		$roles = implode(', ', $user_meta->roles);
		$link = get_author_posts_url($author_id);
		$avatar = get_avatar($author_id);?>
		<div class="author-wrapper">
			<a href="<?php echo $link;?>">
				<div class="author-avatar"><?php echo $avatar;?></div>
				<div class="wrapper-name">
					<div class="author-name"><?php echo $author;?></div>
					<div class="author-roles"><?php echo $roles;?></div>
				</div>
			</a>
		</div>
		
	<?php
	}
	echo '</div>';

}

// this function is connected to uasort function
function str_cmp_func($a, $b)
{
    return strcmp($a, $b);
}


function wst_display_follow_us_authors() {?>
	
	<div class="wrapper-follow-authors">
		<?php display_follow_us();?>
		<hr class="separate">

	 	<?php display_authors();?>
 	</div>
		
	<?php
}
function wst_display_blog_menu_search() {
	$category_id = esc_attr(carbon_get_theme_option('crb_blog_category'));
	$args = array('child_of' => $category_id);
	$categories = get_categories( $args );
    ?>
	<div class="wrapper-blog-menu-search">
		<div class="blog-menu-links">
			<?php 
			if( !is_category() && !is_author() && !is_tag() && !is_search() && !is_single()){
			?> <div class="active"> <?php
			}else{
				?> <div> <?php
			} ?>
				<a href="/blog">Last posts</a>
			</div>
			<?php
			foreach ($categories as $category) {
				if( is_category($category->name)){
				?> <div class="active"> <?php
				}else{
				?> <div> <?php
				} ?>
					<a href="/category/<?php echo $category->name;?>"><?php echo $category->name;?></a>
				</div>
				<?php
			}
			?>

		</div>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
			<i class="fa fa-search" aria-hidden="true"></i>
			<input type="search" class="search-field" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" />
			<span class="search-erase">X</span>
		</form>

	</div>
	<?php

}

function display_subscribe_mail() {
	$subscribe = esc_html(carbon_get_theme_option('crb_blog_sticky_form_ID'));
    ?>
    <div class="subscribe-mail">
		<?php echo do_shortcode('[mc4wp_form id="' . $subscribe .'"]'); ?>
    </div>
    <?php
}

function SearchFilter($query) {
	if ($query->is_search && !is_admin()) {
		$query->set('post_type', array('post','page'));
	}
	return $query;
}

add_filter('pre_get_posts','SearchFilter');
add_theme_support( 'post-thumbnails' );

function highlight_search_term($text){
    if(is_search()){
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys .')/iu', '<span class="search-term">\0</span>', $text);
	}
    return $text;
}
add_filter('wp_trim_words', 'highlight_search_term');


//  this function is called by tag/category/author blog pages to show the blogs that are associated with a certain
// tag/category
// this function also calls the followus_author sidebar
// its actually the content body of the tag/category/author pages
function posts_loop() {
	echo beans_open_markup('blog-wrapper', 'div', array( 'class' => 'blog-wrapper' ));
	 $posts_object = get_queried_object();
	 echo beans_open_markup('blog-content-wrapper', 'div', array( 'class' => 'blog-content-wrapper' ));
	echo beans_open_markup('blog_title_wrapper', 'div', array( 'class' => 'blog-title-wrapper' ));
	
	if( is_author())
	{
		$avatar = get_avatar($posts_object->ID);
		$name = $posts_object->display_name . " | " . implode(', ', $posts_object->roles);
		$description = get_user_meta( $posts_object->ID )['description'][0];
		
	}
	else{
		$avatar = get_term_thumbnail($posts_object->term_taxonomy_id);
		$name = $posts_object->name;
		$description = $posts_object->description;
	} ?>
	<div class="blog-title-avatar"><?php echo $avatar; ?></div>
	<div class="blog-title-wrapper-name">
		<div class="blog-title-name"><?php echo $name;?></div>
		<div class="blog-title-description"><?php echo wpautop($description);?></div>
	</div>
	<?php
	echo beans_close_markup( 'blog_title_wrapper', 'div' );

	echo beans_open_markup('wrapper-posts', 'div', array( 'class' => 'wrapper-posts' ));


    if ( have_posts() && !is_404() ) : while ( have_posts() ) : the_post(); 
    	include 'views/post-in-blog-view.php';

    endwhile; else : ?>

        <div class="uk-alert">No Posts</div>

    <?php endif;

    // Display posts pagination.
    beans_posts_pagination();
	echo beans_close_markup( 'wrapper-posts', 'div' );
    echo beans_close_markup( 'blog-content-wrapper', 'div' );
	wst_display_follow_us_authors();
	echo beans_close_markup( 'blog-wrapper', 'div' );

}


// adding active class to menu item
function be_menu_item_classes( $classes, $item, $args ) {
	$post_slug = strtolower(get_post_field( 'post_name'));
	$menu_title = strtolower($item->title);
	if( strcmp($post_slug, $menu_title) == 0 )
		$classes[] = 'current-menu-item';
		
	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'be_menu_item_classes', 10, 3 );


// set allow comments on posts by default

add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open=null, $post_id ) {
	if( is_single($post_id) || get_post_type($post_id) == 'post')
	{
		return true;
	}
	return false;
}

function comments_on( $data ) {
    if( $data['post_type'] == 'post' ) {
        $data['comment_status'] = 1;
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'comments_on' );

// in wordpress media - making the image url to be relative

function switch_to_relative_url($html, $id, $caption, $title, $align, $url, $size, $alt)
{
$imageurl = wp_get_attachment_image_src($id, $size);
$relative_image_url = wp_make_link_relative($imageurl[0]); 
$relative_url =   wp_make_link_relative($url); 
$html = str_replace($imageurl[0],$relative_image_url,$html);
$html = str_replace($url,$relative_url,$html);
      
return $html;
}
add_filter('image_send_to_editor','switch_to_relative_url',10,8);

// making internal links relative
//Causes error in yoast site map
/*function internal_link_to_relative(  $url, $post, $leavename ) {

	$url = wp_make_link_relative($url);
	return $url;
}
add_filter( 'post_link', 'internal_link_to_relative', 10, 3 );
add_filter( 'page_link', 'internal_link_to_relative', 10, 3 );
*/

// replacing absolute url with relative url
function filter_wp_get_attachment_url( $url, $attachment ) {
   $rel_url = wp_make_link_relative($url);
   if($rel_url){
    return $rel_url;
   }else{
	   return $url;
   }
}

add_filter( 'wp_get_attachment_url', 'filter_wp_get_attachment_url', 10, 2);

function next_custom_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ){

	foreach( $sources as $key => &$source){

		$rel_image = wp_make_link_relative( $source['url'] );
		$source['url'] = $rel_image;
	  }

         return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'next_custom_image_srcset', 10, 5 );

/***** Add image to RSS2 feed ******/
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<div><img style="margin-top:15px" src="'. site_url() . get_the_post_thumbnail_url( $post->ID, 'medium_large' ) . '"/></div>' . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');


/************ Disable comment form URL field **************/
function crunchify_disable_comment_url($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');

/************ REcahpcha **************/

/*Add Google captcha field to Comment form*/

add_filter('comment_form','add_google_captcha');

function add_google_captcha(){
    echo '<div class="g-recaptcha" data-sitekey="6LeMeC0UAAAAAGb5NwqTi39XxGUc3AxzHEeb1tQn"></div>';
}

/*End of Google captcha*/

/*comment validation*/
function comment_validation_init() {
    if(is_singular() && comments_open() ) { ?>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#commentform').validate({

                onfocusout: function(element) {
                  this.element(element);
                },

                rules: {
                  author: {
                    required: true,
                    minlength: 2,
                    normalizer: function(value) { return $.trim(value); }
                  },

                  email: {
                    required: true,
                    email: true
                  },

                  comment: {
                    required: true,
                    minlength: 10,
                    normalizer: function(value) { return $.trim(value); }
                  }
                },

                messages: {
                  author: "Please enter in your name.",
                  email: "Please enter a valid email address.",
                  comment: "Minimum message length is 10 characters "
                },

                errorElement: "div",
                errorPlacement: function(error, element) {
                  element.after(error);
                }

                });
            });
        </script>
    <?php
    }
}
add_action('wp_footer', 'comment_validation_init');

function send_comment_email_notification( $comment_ID, $commentdata ) {
    $comment = get_comment( $comment_ID );
    $postid = $comment->comment_post_ID;
    $Mrecipient = carbon_get_theme_option( 'crb_comment_moderator_mail' );
    if( isset( $Mrecipient ) && is_email( $Mrecipient ) ) {
        $message = 'New comment on <a href="'. get_site_url() . get_permalink( $postid ) . '">' .  get_the_title( $postid ) . '</a><br/>
            To moderate <a href="'. get_site_url() .'/wp-admin/comment.php?action=editcomment&c='. $comment_ID .'">click here</>';
        add_filter( 'wp_mail_content_type', create_function( '', 'return "text/html";' ) );
        wp_mail( "$Mrecipient", 'New Comment on the Next insurance Blog', $message );
    }
}
add_action( 'comment_post', 'send_comment_email_notification', 11, 2 );
