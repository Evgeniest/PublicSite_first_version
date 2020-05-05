<?php

$menu_column1 = carbon_get_theme_option( 'crb_footer_menu_column1' );
$menu_column1_items = $menu_column1 == 0 ? array() : wp_get_nav_menu_items($menu_column1);
$menu_column1_title = $menu_column1 == 0 ? '' : wp_get_nav_menu_object($menu_column1)->name;

$menu_column2 = carbon_get_theme_option( 'crb_footer_menu_column2' );
$menu_column2_items = $menu_column2 == 0 ? array() : wp_get_nav_menu_items($menu_column2);
$menu_column2_title = $menu_column2 == 0 ? '' : wp_get_nav_menu_object($menu_column2)->name;

$menu_column3 = carbon_get_theme_option( 'crb_footer_menu_column3' );
$menu_column3_items = $menu_column3 == 0 ? array() : wp_get_nav_menu_items($menu_column3);
$menu_column3_title = $menu_column3 == 0 ? '' : wp_get_nav_menu_object($menu_column3)->name;

$Email = carbon_get_theme_option( 'crb_footer_support_mail' );

$support_text = carbon_get_theme_option( 'crb_footer_support_text' );

$review = carbon_get_theme_option( 'crb_footer_review' );

$fb = carbon_get_theme_option( 'crb_footer_support_fb' );
$twitter = carbon_get_theme_option( 'crb_footer_support_twitter' );
$youtube = carbon_get_theme_option( 'crb_footer_support_youtube' );
$linkedin = carbon_get_theme_option( 'crb_footer_support_linkedin' );
$google = carbon_get_theme_option( 'crb_footer_support_google' );
$in = carbon_get_theme_option( 'crb_footer_support_in' );

$partners = carbon_get_theme_option( 'crb_footer_partners', 'complex' );

$next_logo = carbon_get_theme_option( 'crb_footer_next_logo' );

$logal_menu = carbon_get_theme_option( 'crb_footer_legal_menu' );
$logal_menu_items = $logal_menu == 0 ? array() : wp_get_nav_menu_items($logal_menu);

$securu_code = carbon_get_theme_option( 'crb_footer_secure_code' );

?>

<div class="footer-first-row uk-container uk-container-center">
	<div class="footer-menus">
		<div class="footer-menu-group">
		<?php if(!empty($menu_column1_items))  {?>
		<div class="footer-menu">
			<div class="title"><?php echo $menu_column1_title; ?></div>
		<?php foreach ($menu_column1_items as $menu_item) {?>
			<div>
				<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
			</div>
	    <?php }?>
	    </div>
	    <?php }?>

	    <?php if(!empty($menu_column2_items))  {?>
	    <div class="footer-menu">
			<div class="title"><?php echo $menu_column2_title; ?></div>
		<?php foreach ($menu_column2_items as $menu_item) {?>
			<div>
				<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
			</div>
	    <?php }?>
	    </div>
	    <?php }?>
		</div>
	    <?php if(!empty($menu_column3_items))  {?>
	    <div class="footer-menu last">
		<div class="title"><?php echo $menu_column3_title; ?></div>
		<?php foreach ($menu_column3_items as $menu_item) {?>
			<div>
				<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
			</div>
	    <?php }?>
	    </div>
	    <?php }?>

	</div>


	<div class="footer-support">
		<div class="support-title title">Support</div>
		<div class="support-email"><?php echo $Email; ?><br/><br/></div>
		<div class="support-extra-information"><?php echo wpautop($support_text); ?></div>
		<div class="support-icons">
			<?php if($fb) { ?><a class="icon fb" target="_blank" href="<?php echo $fb; ?>"></a><?php }?>
			<?php if($twitter) { ?><a class="icon twitter"  target="_blank" href="<?php echo $twitter; ?>"></a><?php }?>
			<?php if($linkedin) { ?><a class="icon linkedin"  target="_blank" href="<?php echo $linkedin; ?>"></a><?php }?>
			<?php if($youtube) { ?><a class="icon youtube" target="_blank"  href="<?php echo $youtube; ?>"></a><?php }?>
			<?php if($google) { ?><a class="icon google" target="_blank" href="<?php echo $google; ?>"></a><?php }?>
			<?php if($in) { ?><a class="icon in" target="_blank" href="<?php echo $in; ?>"></a><?php }?>
		</div>
	</div>
</div>

<div class="footer-second-row">
	<div class="uk-container uk-container-center">
		<div class="review"><?php echo $review; ?></div>
		<div class="partners">
			<div class="partners-title title">Our Partners</div>
			<div class="partners-logos">
				<?php foreach ($partners as $partner) {?>
				<div class="partner-logo">
					
					<?php echo wp_get_attachment_image( esc_html($partner['crb_footer_partner_logo']), 'full' ); ?>
					
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<div class="footer-third-row">
	<div class="uk-container uk-container-center">
		<div class="footer-next-insurance-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo wp_get_attachment_image( esc_html($next_logo), 'full' ); ?>
			</a>
		</div>
		<div class="footer-legal-menu">
		<?php foreach ($logal_menu_items as $menu_item) {?>
			<div>
				<a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
			</div>
	    <?php }?>
		</div>
		<div class="footer-secure-logo">
			<?php echo $securu_code; ?>
		</div>
	</div>
</div>