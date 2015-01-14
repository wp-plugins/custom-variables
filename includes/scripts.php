<?php

function cvem_load_scripts(){

		wp_enqueue_style( 'cvem_style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
		wp_enqueue_script( 'cvem_script', plugin_dir_url( __FILE__ ) . 'js/cvem.js' );


}
add_action('admin_enqueue_scripts','cvem_load_scripts');



?>