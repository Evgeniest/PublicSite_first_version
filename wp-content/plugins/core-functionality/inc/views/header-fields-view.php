<?php
$image_id = esc_attr($layout['crb_header_field_image']);
$image = wp_get_attachment_image($image_id,'full');
$title = esc_attr($layout['crb_header_field_title']);
$color = esc_attr($layout['crb_header_field_color']);
$bg = esc_attr($layout['crb_header_field_bg']);
?>
<div class="custom-header-image">
    <?php echo $image; ?>
</div>
<div class="colored-text" style="color:<?php echo $color; ?>; background-color:<?php echo $bg; ?>"><span><?php echo $title; ?></span></div>