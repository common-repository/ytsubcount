<?php

function ytsuco_add_scripts(){

wp_enqueue_style('ytsuco-main-style', plugin_dir_url(__FILE__).'css/style.css');    
wp_enqueue_script('ytsuco-main-script', plugin_dir_url(__FILE__).'js/main.js');

wp_register_script('google', 'https://apis.google.com/js/platform.js');
wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'ytsuco_add_scripts');