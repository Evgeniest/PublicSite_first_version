<?php
beans_modify_action_callback( 'beans_loop_template', 'posts_loop' );
remove_action( 'beans_primary_menu_append_markup' , 'example_primary_menu_toggle' );
beans_remove_markup( 'beans_primary_menu' );
beans_remove_output( 'beans_primary_menu' );
beans_remove_action( 'header_search' );
beans_remove_action( 'beans_post_meta_tags' );
beans_remove_action( 'beans_post_title' );
beans_remove_action( 'beans_post_image' );
beans_add_smart_action( 'beans_content_prepend_markup', 'wst_display_blog_menu_search' );

beans_add_smart_action( 'beans_main_after_markup', 'display_subscribe_mail' );

beans_load_document();