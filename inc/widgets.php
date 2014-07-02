<?php
/**
 *  Custom Widget for displaying social links.
 */

class Twenty_Fourteen_Bamboo_Social_Widget extends WP_Widget {
  /**
   * Constructor.
   */
  public function __construct() {
    parent::__construct('widget_twentyfourteen_bamboo_social',
                        __('Twenty Fourteen Bamboo Social',
                           'twentyfourteen-bamboo' ),
                        array('classname'   => 'widget_twentyfourteen_bamboo_social',
                              'description' => __('A widget for displaying social links using icons.', 'twentyfourteen-bamboo'), )
                        );
  }

  /**
   * Output the HTML for this widget.
   *
   * @param array $args
   * @param array $instance
   */
  public function widget($args, $instance) {
    $title = apply_filters('widget_title', $instance['title']);
    $twitter_url = $instance['twitter_url'];
    $facebook_url = $instance['facebook_url'];
    $gplus_url = $instance['gplus_url'];
    $github_url = $instance['github_url'];
    $feed_url = $instance['feed_url'];
    $email = $instance['email'];

    echo $args['before_widget'];
    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];
    echo '<p>';
    if (!empty($twitter_url))
      echo '<a href="' . esc_url($twitter_url) . '" class="twitter-profile"></a>';
    if (!empty($facebook_url))
      echo '<a href="' . esc_url($facebook_url) . '" class="facebook-profile"></a>';
    if (!empty($gplus_url))
      echo '<a href="' . esc_url($gplus_url) . '" class="googleplus-profile"></a>';
    if (!empty($github_url))
      echo '<a href="' . esc_url($github_url) . '" class="github-profile"></a>';
    if (!empty($feed_url))
      echo '<a href="' . esc_url($feed_url) . '" class="feed-link"></a>';
    if (!empty($email))
      echo '<a href="mailto:' .$email . '" class="email-link"></a>';
    echo '</p>';
    echo $args['after_widget'];
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form($instance) {
    if (isset($instance['title'])) {
      $title = $instance['title'];
    }
    else {
      $title = __('Social', 'text_domain');
    }
    $twitter_url = $instance['twitter_url'];
    $facebook_url = $instance['facebook_url'];
    $gplus_url = $instance['gplus_url'];
    $github_url = $instance['github_url'];
    $feed_url = $instance['feed_url'];
    $email = $instance['email'];
?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter profile:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo $twitter_url; ?>">
      <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook profile:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php echo $facebook_url; ?>">
      <label for="<?php echo $this->get_field_id('gplus_url'); ?>"><?php _e('Google+ profile:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('gplus_url'); ?>" name="<?php echo $this->get_field_name('gplus_url'); ?>" type="text" value="<?php echo $gplus_url; ?>">
      <label for="<?php echo $this->get_field_id('github_url'); ?>"><?php _e('Github profile:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('github_url'); ?>" name="<?php echo $this->get_field_name('github_url'); ?>" type="text" value="<?php echo $github_url; ?>">
      <label for="<?php echo $this->get_field_id('feed_url'); ?>"><?php _e('Feed link:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('feed_url'); ?>" name="<?php echo $this->get_field_name('feed_url'); ?>" type="text" value="<?php echo $feed_url; ?>">
      <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email address:'); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>">
    </p>
<?php
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['twitter_url'] = esc_url_raw($new_instance['twitter_url']);
    $instance['facebook_url'] = esc_url_raw($new_instance['facebook_url']);
    $instance['gplus_url'] = esc_url_raw($new_instance['gplus_url']);
    $instance['github_url'] = esc_url_raw($new_instance['github_url']);
    $instance['feed_url'] = esc_url_raw($new_instance['feed_url']);
    $instance['email'] = is_email($new_instance['email']);

    return $instance;
  }
}
