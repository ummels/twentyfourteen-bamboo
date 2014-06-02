<?php

function load_fonts() {
         wp_register_style('roboto', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Source+Code+Pro:500');
         wp_enqueue_style( 'roboto');
}

add_action('wp_print_styles', 'load_fonts');

?>
