<?php
$user_id = wp_get_current_user()->ID;  ?>

<div id="shortcode_header">
  <div id="search_button" class="col1">
    <a><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Zoom.png'; ?>"/></a>
  </div>

  <?php
  if(!get_user_meta($user_id, 'artist', true)): ?>
    <div id="become_artist_button" class="col2">
      <a class="dashboard_url" href="<?php echo esc_url(home_url()).'/dashboard/'; ?>">I'm a MAD artist</a>
    </div><?php
  endif;

  if(is_user_logged_in()):  ?>
    <div id="header_notifications_container" class="col1" onclick="header_dropdown('#header_notifications_dropdown');">
      <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Notification.png'; ?>"/>
      <a>Notifications</a>

      <div id="header_notifications_dropdown" class="dropdown">
        <div class="content">
          Notifs
        </div>
      </div>
    </div>

    <div class="separator"></div>

    <?php
    if(get_user_meta($user_id, 'artist', true)): ?>
      <div id="header_artist_manager_container" class="col1">
        <a href="<?php echo esc_url(home_url()).'/dashboard/'; ?>">
          <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/ArtistManger.png'; ?>"/>
          <p>Artist Manager</p>
        </a>
      </div>

      <div class="separator"></div>
      <?php
    endif; ?>

    <div id="header_profil_container" class="col1" onclick="header_dropdown('#header_profil_dropdown');">
      <?php
      if(!empty(get_user_meta($user_id, 'profil_picture', true))): ?>
        <img class="profil_img" src="<?php echo wp_get_attachment_url(get_user_meta($user_id, 'profil_picture', true)); ?>"/><?php
      else: ?>
        <img class="profil_img" src="<?php echo PLUGIN_MAD_URL.'/MAD/img/user.png'; ?>"/><?php
      endif; ?>
      <a><?php echo ucfirst(substr(get_user_meta($user_id, 'first_name', true), 0, 7)); ?></a>

      <div id="header_profil_dropdown" class="dropdown">
        <div class="content">
          <div class="header_profil_infos">
            <div>
              <?php
              if(!empty(get_user_meta($user_id, 'profil_picture', true))): ?>
                <img class="profil_img" src="<?php echo wp_get_attachment_url(get_user_meta($user_id, 'profil_picture', true)); ?>"/><?php
              else: ?>
                <img class="profil_img" src="<?php echo PLUGIN_MAD_URL.'/MAD/img/user.png'; ?>"/><?php
              endif; ?>
            </div>

            <div>
              <a><?php echo get_user_meta($user_id, 'first_name', true).' '.get_user_meta($user_id, 'last_name', true); ?></a>
              <a href="<?php echo esc_url(home_url()).'/profil/'; ?>">View profil ></a>
            </div>
          </div>

          <div class="header_profil_links">
            <a href="<?php echo esc_url(home_url()).'/profil/?favorties=1'; ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/favorites.png'; ?>"/> Favorites</a>
            <a href="<?php echo esc_url(home_url()).'/profil/?messages=1'; ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/messages.png'; ?>"/> Messages</a>
            <a href="<?php echo esc_url(home_url()).'/profil/?purchases=1'; ?>">Purchases and reviews</a>
            <a>Account settings</a>
          </div>

          <a class="logout_link" href="<?php echo wp_logout_url(); ?>">Sign out</a>
        </div>
      </div>
    </div>

    <div class="separator"></div>

    <div id="cart_button" class="col1">
      <a href="<?php echo esc_url(home_url()).'/cart/'; ?>"><img class="cart_img" src="<?php echo PLUGIN_MAD_URL.'/MAD/img/Shop.png'; ?>"/></a>
    </div><?php
  else: ?>
    <div class="col1">
      <a onclick="show_popup('#login_popup');">Log in</a>
    </div><?php
  endif; ?>

  <div class="separator"></div>

  <div id="languages_switcher" class="col1">
    <a>EN</a> / <a>FR</a>
  </div>
</div>
