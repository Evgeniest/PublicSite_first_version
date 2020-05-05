<?php
//function wst_register_customizer($wp_customize){
//	$wp_customize->add_section(
//		'home_settings_section',
//		array(
//			'title' => 'Home Settings',
//			'description' => 'This is the home section settings.',
//			'priority' => 300,
//		)
//	);
//	$wp_customize->add_setting(
//		'hero_textbox',
//		array(
//			'default' => 'The One Restaurant',
//		)
//	);
//	$wp_customize->add_control(
//		'hero_textbox',
//		array(
//			'label' => 'Hero Title',
//			'section' => 'home_settings_section',
//			'type' => 'text',
//		)
//
//	);
//	$wp_customize->add_setting(
//		'hero_subtitle',
//		array(
//			'default' => 'Fresh Food and Fine Wines',
//		)
//	);
//	$wp_customize->add_control(
//		'hero_subtitle',
//		array(
//			'label' => 'Hero subtitle',
//			'section' => 'home_settings_section',
//			'type' => 'text',
//		)
//
//	);
//
//	$wp_customize->add_setting(
//		'hero_image'
//	);
//	$wp_customize->add_control(
//		new WP_Customize_Image_Control(
//			$wp_customize,
//			'hero_image',
//			array(
//				'label' => 'Hero Image',
//				'section' => 'home_settings_section',
//				'settings' => 'hero_image'
//			)
//		)
//	);
//
//}
//add_action('customize_register','wst_register_customizer');