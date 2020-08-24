<?php
$user_id = wp_get_current_user()->ID;

if(get_user_meta($user_id, 'artist', true)): ?>
  <a class="dashboard_link" href="<?php echo $atts['link']; ?>"><?php echo $atts['text']; ?></a><?php
elseif(get_user_meta($user_id, 'become_artist', true)): ?>
  <a class="dashboard_link" href="<?php echo esc_url(home_url()).'/dashboard/become-an-artist/'; ?>"><?php echo $atts['text']; ?></a><?php
elseif(is_user_logged_in()): ?>
  <a class="dashboard_link" onclick="show_become_artist_popup();"><?php echo $atts['text']; ?></a><?php
else: ?>
  <a class="dashboard_link" onclick="show_popup('#login_popup');"><?php echo $atts['text']; ?></a><?php
endif; ?>
