<?php
/*
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}
*/
add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'blalock_scripts', 100);
function blalock_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'fontawesome',
    '//use.fontawesome.com/004c3c54fb.js',
    array('jquery'),
    '',
    false
  );
/*
  wp_register_script(
    'blalock-scripts', 
    get_template_directory_uri() . '/js/blalock-scripts.js', 
    array('jquery'), 
    '', 
    true
  );
*/  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('fontawesome');
  //wp_enqueue_script('blalock-scripts');  
}

add_action('wp_enqueue_scripts', 'blalock_styles');
function blalock_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('blalock', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('blalock');
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'General Settings',
    'menu_title' => 'General Settings',
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}
