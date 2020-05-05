<?php 
/*beans_replace_attribute('beans_primary_menu_offcanvas_button','class','uk-button uk-hidden-large','new-menu-button uk-visible-small');
beans_replace_attribute('beans_menu[_navbar][_primary]','class','uk-visible-large','uk-hidden-small');
beans_remove_attribute('beans_primary_menu_offcanvas_button_icon','class','uk-icon-navicon');
beans_remove_output('beans_offcanvas_menu_button');
beans_add_smart_action( 'beans_primary_menu_offcanvas_button_append_markup', 'menu_new_output' );*/
/*function menu_new_output () {
	echo 'Select Business <i class="uk-icon-chevron-down"></i>';
}*/
//beans_remove_action('beans_primary_offcanvas_menu');
remove_theme_support( 'offcanvas-menu' );

// Add class to hide desktop primary nav which was removed with the off-canvas support.
beans_add_attribute( 'beans_menu[_navbar][_primary]', 'class', 'uk-visible-large' );

// Add primary mobile nav toggle button.
add_action( 'beans_primary_menu_append_markup', 'example_primary_menu_toggle' );

function example_primary_menu_toggle() {

    ?><button class="uk-button uk-hidden-large slide-menu-button">
    Who we insure <i class="fa fa-times" aria-hidden="true"></i><i class="uk-icon-chevron-down"></i>
    </button><?php

}

// Add primary mobile nav.
add_action( 'beans_header_append_markup', 'slider_primary_mobile_menu' );

function slider_primary_mobile_menu() {

    
    beans_replace_attribute( 'beans_menu_item[_offcanvas][_mobile_header]', 'aria-expanded', 'false', 'true' );
    beans_add_attribute( 'beans_menu_item[_offcanvas][_mobile_header]', 'class','uk-open' );
    ?>
    <div id="slider-primary-mobile-menu" class="uk-container uk-container-center slider-primary-mobile-menu">
        <?php wp_nav_menu( array(
           // 'theme_location' => has_nav_menu( 'primary' ) ? 'primary' : '',
           'menu' => 'mobile_header',
            'fallback_cb' => 'beans_no_menu_notice',
            'container' => '',
            'beans_type' => 'offcanvas' // This is giving the sidenav menu style for the sake of the example.
        ) ); ?>
    </div>
    <?php
    }

//overlay on slider menu clicked
add_action('beans_site_before_markup', 'set_div_overlay_func');
function set_div_overlay_func(){
    ?>
    <div class="overlay"></div>
    <?php
}

// Add off-canvas buttons before the main grid as an example.
add_action( 'beans_header_append_markup', 'beans_child_view_offcanvas_buttons' );

function beans_child_view_offcanvas_buttons() {

    ?>
    <a class="button-menu-offcanvas" href="#top_offcanvas" data-uk-offcanvas>
        <i class="ico"></i>
        <i class="ico"></i>
        <i class="ico"></i>
    </a>
    <?php

}

// Add the off-canvas widget area after the site closing markup.
add_action( 'beans_site_after_markup', 'beans_child_view_offcanvas' );

function beans_child_view_offcanvas() {

    echo beans_widget_area( 'top_offcanvas' );

}
//move menu offcanvas to right
beans_add_attribute('beans_widget_area_offcanvas_bar[_top_offcanvas]', 'class', 'uk-offcanvas-bar-flip' );
beans_add_attribute('beans_widget_panel[_top_offcanvas][_nav_menu]', 'class', 'offcanvas-menu');
//add close button
beans_add_smart_action('beans_widget_panel[_top_offcanvas][_nav_menu]_after_markup', 'set_close_button_func');
//_nav_menu
function set_close_button_func(){
    echo "<a class='close-btn'>X</a>";
}

add_action( 'beans_site_branding_after_markup', 'set_top_right_menu' );
function set_top_right_menu(){
        wp_nav_menu( array(
            'menu' => 'Navigation',
            'menu_class' => 'uk-subnav uk-subnav-line',
            'container' => 'div',
            'container_class' => 'uk-align-right right-menu-desktop',
            'echo' => true,
            'fallback_cb' => false,
        ) );
    
}