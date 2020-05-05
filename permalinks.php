<?php

include "wp-load.php";

$posts = new WP_Query('post_type=any&posts_per_page=-1&post_status=publish');
$posts = $posts->posts;
wp_head();
//header('Content-type:text/plain');
$count =0;
echo '<div class="links-start">Links Start</div>';
foreach($posts as $post) {
    switch ($post->post_type) {
        case 'revision':
        case 'nav_menu_item':
            break;
        case 'page':
            $permalink = get_page_link($post->ID);
            break;
        case 'post':
            $permalink = get_permalink($post->ID);
            break;
        case 'attachment':
            $permalink = get_attachment_link($post->ID);
            break;
        default:
            $permalink = get_post_permalink($post->ID);
            break;

    }
    $count ++;
    echo "<div class=\"link-";
    echo $count . "\">";
    echo get_site_url();
    echo $permalink;
    echo "</div>";
    //echo "\n{$post->post_type}\t{$permalink}\t{$post->post_title}";
}
echo '<div class="links-end">Links End</div>';
wp_footer();
