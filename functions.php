<?php

function disable_lato() {
    wp_dequeue_style('twentyfourteen-lato');
}
add_action('wp_enqueue_scripts', 'disable_lato', 11);

function load_fonts() {
    wp_register_style('merriweather', 'http://fonts.googleapis.com/css?family=Merriweather:400,700,400italic,700italic|Merriweather+Sans:400,700|Cousine');
    wp_enqueue_style('merriweather');
}
add_action('wp_enqueue_scripts', 'load_fonts');

function load_highlight() {
    wp_register_script('highlight',  get_stylesheet_directory_uri() . '/highlight-js/highlight.pack.js', false, '8.0', true);
    wp_enqueue_script('highlight');
    wp_register_style('highlight', get_stylesheet_directory_uri() . '/highlight-js/googlecode.css', false, '8.0', 'screen');
    wp_enqueue_style('highlight');
}
add_action('wp_enqueue_scripts', 'load_highlight');

function init_highlight() {
    echo '<script>hljs.initHighlightingOnLoad();</script>' . "\n";
}
add_action('wp_footer', 'init_highlight', 25);

function register_social_widget() {
  require get_stylesheet_directory() . '/inc/widgets.php';
  register_widget('Twenty_Fourteen_Bamboo_Social_Widget');
}
add_action('widgets_init', 'register_social_widget');

function bamboo_customize_register($wp_customize) {
  $wp_customize->add_section('social_sharing',
                             array('title' => __('Social Sharing', 'twentyfourteen-bamboo'),
                                   'priority' => 140)
                             );
  $wp_customize->add_setting('social_sharing_enabled');
  $wp_customize->add_control('social_sharing_enabled',
                             array('label' => __('Add links after each post', 'twentyfourteen-bamboo'),
                                   'section' => 'social_sharing',
                                   'type' => 'checkbox')
                             );
  $wp_customize->add_setting('twitter_name');
  $wp_customize->add_control('twitter_name',
                             array('label' => __('Twitter name (optional)', 'twentyfourteen-bamboo'),
                                   'section' => 'social_sharing')
                             );
}
add_action('customize_register', 'bamboo_customize_register');

function twitter_share($url, $text) {
  if (get_theme_mod('twitter_name'))
    $href = 'https://twitter.com/intent/tweet?text=' . urlencode($text) .
      '&url=' . urlencode($url) . '&via=' . get_theme_mod('twitter_name');
  else
    $href = 'https://twitter.com/intent/tweet?text=' . urlencode($text) .
      '&url=' . urlencode($url);
  return '<a href="' . $href . '" class="twitter" target="_blank" title="Share on Twitter" rel="external nofollow"></a>';
}

function fb_share($url) {
  $href = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url);
  return '<a href="' . $href . '" class="facebook" target="_blank" title="Share on Facebook" rel="external nofollow"></a>';
}

function gplus_share($url) {
  $href = 'https://plus.google.com/share?url=' . urlencode($url);
  return '<a href="' . $href . '" class="gplus" target="_blank" title="Share on Google+" rel="external nofollow"></a>';
}

function add_sharing_links($content) {
  if (get_theme_mod('social_sharing_enabled')) {
    $content = $content .
      '<div class="social-sharing"><p>' .
      twitter_share(get_permalink(), get_the_title()) .
      fb_share(get_permalink()) .
      gplus_share(get_permalink()) .
      '</p></div>';
  }
  return $content;
}
add_filter('the_content', 'add_sharing_links', 20);

?>
