<?php
/*
Plugin Name: Display YouTube sub button and count
Plugin URI: https://wordpress.org/plugins/display-youtube-subs-count/
Description: Widget to exhibit a subscribe button and the option to show/hide the sub count and change layout
Version: 1.0
Author: Nada Lubbad
Author URI: http://nlubbad.com
Text Domain: ytsuco_domain
License: GPLv2 or later
*/


if(!defined('ABSPATH')){
    exit;
}

require_once(plugin_dir_path(__FILE__).'/inc/displaysubcount-scripts.php');
require_once(plugin_dir_path(__FILE__).'/inc/displaysubcount-class.php');

function register_youtubesubscount(){
    register_widget('Youtube_Subs_Count_Widget');
}

add_action('widgets_init', 'register_youtubesubscount');