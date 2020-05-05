<?php
$image_id = esc_attr($item['crb_image']);
$image = wp_get_attachment_image($image_id,'full');
$name = esc_attr($item['crb_leader_name']);
$bio = esc_attr($item['crb_leader_bio']);
$experiense = esc_attr($item['crb_leader_experiense']);
$education = esc_attr($item['crb_leader_education']);
?>
<div class="leader-item">
	<?php if($image) {?><div class="leader-image"><?php echo $image;?></div><?php }?>
	<?php if($name) {?><div class="leader-name"><?php echo $name;?></div><?php }?>
	<?php if($bio) {?><div class="leader-bio"><?php echo $bio;?></div><?php }?>
	<?php if($experiense) {?>
	<div class="leader-experiense-wrapper">
		<div class="experiense-title title">Experience</div>
		<div class="experiense-content"><?php echo wpautop($experiense);?></div>
	</div>
	<?php }?>
	<?php if($education) {?>
	<div class="leader-education-wrapper">
		<div class="education-title title">Education</div>
		<div class="education-content"><?php echo wpautop($education);?></div>
	</div>
	<?php }?>
</div>
