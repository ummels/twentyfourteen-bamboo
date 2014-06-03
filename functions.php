<?php

function load_fonts() {
         wp_register_style('merriweather', 'http://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic|Merriweather+Sans:400,700|Cousine');
         wp_enqueue_style( 'merriweather');
}

add_action('wp_print_styles', 'load_fonts');

?>
