<?php

function load_fonts() {
    wp_register_style('merriweather', 'http://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic|Merriweather+Sans:400,700|Cousine');
    wp_enqueue_style('merriweather');
}

function disable_lato() {
    wp_dequeue_style('twentyfourteen-lato');
}

add_action('wp_print_styles', 'load_fonts');
add_action('wp_enqueue_scripts', 'disable_lato', 11);

?>
