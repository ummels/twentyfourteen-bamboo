<?php

function disable_lato() {
    wp_dequeue_style('twentyfourteen-lato');
}

function load_fonts() {
    wp_register_style('merriweather', 'http://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic|Merriweather+Sans:400,700|Cousine');
    wp_enqueue_style('merriweather');
}

function load_highlight() {
    wp_register_script('highlight',  get_stylesheet_directory_uri() . '/highlight-js/highlight.pack.js', false, '8.0', true);
    wp_enqueue_script('highlight');
    wp_register_style('highlight', get_stylesheet_directory_uri() . '/highlight-js/googlecode.css', false, '8.0', 'screen');
    wp_enqueue_style('highlight');
}

function init_highlight() {
    echo '<script>hljs.initHighlightingOnLoad();</script>' . "\n";
}

function register_social_widget() {
  require get_stylesheet_directory() . '/inc/widgets.php';
  register_widget('Twenty_Fourteen_Bamboo_Social_Widget');
}

add_action('wp_enqueue_scripts', 'disable_lato', 11);
add_action('wp_enqueue_scripts', 'load_fonts');
add_action('wp_enqueue_scripts', 'load_highlight');
add_action('wp_footer', 'init_highlight', 25);
add_action('widgets_init', 'register_social_widget');

?>
