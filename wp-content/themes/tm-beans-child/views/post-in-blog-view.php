<div class="post-wrapper">
  <div class="post-image"><a href="<?php the_permalink();?>"><?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium');?></a>	</div>
    <!-- 'custom-size'beans_post_image() -->
    <div class="post-wrapper-details-container">
      <div class="post-wrapper-details">
        <p class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
        <div class="post-date-author"><span class="author"><?php  the_author();?></span> | <span class="date"><?php  echo get_the_date();?></span></div>
        <div class="post-content"><?php the_excerpt();?> </div>
        <br/>
        <a href="<?php the_permalink();?>">Read More &gt;</a>
  <!--<div class="post-tags-comments">-->
  <div class="post-tags"><?php echo get_the_tag_list('','  '); ?></div>
  <div class="post-comments">
    <?php $num_comments = get_comments_number();
    if( $num_comments != 0){ ?>
      <a href="<?php echo get_comments_link(); ?>">
        <div class="comment-icon"></div>
        <div class="comments-num"> <?php echo $num_comments; ?></div>
      </a>
    <?php } ?>
  </div> <!-- post-comments -->
  <!--</div> --><!--post-tags-comments -->
</div> <!--post-wrapper-details-->

</div> <!--post-wrapper-details-container-->

</div>