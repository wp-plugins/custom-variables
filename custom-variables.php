<?php
/*
Plugin Name: Custom Variables
Plugin URI: http://www.easymode.com.au/custom-variables
Description: With this plugin, you can create your own variables and use them in WordPress site. It is much more convenient when you update your variables. For example, your contact phone number displays in four places on your site. When you need to update your phone number, you have to find each of them and edit them one by one. With this plugin, you only need to edit it once at the control panel. You can put the shortcode anywhere on your website.
Version: 1.0
Author: Allen Li
Author URI: http://www.easymode.com.au
*/

/****************************
global variables
***************************/
define('CVEM_PLUGIN_NAME','Custom Variables');
define('CVEM_PREFIX','cvem_');

//retrieve our plugin settings from the option table
$cvem_options=get_option('cvem_settings');

/****************************
includes
***************************/
include('includes/scripts.php'); // this controls all JS/CSS
include('includes/data-processing.php'); // this controls all saving of data
include('includes/display-functions.php');// display content functions
include('includes/setting.php');// display plugin options page












?>