<?php
beans_add_smart_action('wp','wst_set_up_sidebars_structure');
function wst_set_up_sidebars_structure(){
	beans_add_attribute( 'beans_widget_panel', 'class', 'uk-panel-box' );
}