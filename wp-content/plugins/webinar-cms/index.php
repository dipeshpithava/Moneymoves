<?php
/*
Plugin Name: Webinar CMS
Description: Webinar CMS Plugin to perform CRUD operation.
Author: Dipesh Pithwa
Version: 0.1
*/

//add_action('admin_menu', 'webinar_plugin_setup_menu');
// 
//function webinar_plugin_setup_menu(){
//    add_menu_page( 'Webinar CMS Page', 'Webinar CMS', 'manage_options', 'webinar-cms', 'webinar_init' );
//}
// 
//function webinar_init(){
//	include_once "style.php";
//	echo "<h1>Webinar</h1>";
//	echo do_shortcode('[abase table="webinar_thumbs"]');
//}

// include necessary files
include_once 'insert_update_delete_function.php';

//When plugin activated then which functin
//register_activation_hook( __FILE__, 'create_database' );
add_action('admin_menu','add_menu');
?>