<?php
$user_id =  get_post_meta($post->ID, 'user_associate', true); ?>

<div class="metrics_box">
  <?php
  if(empty(get_user_meta($user_id, 'public_name', true))): ?>
    <p class="artist_namebis"><?php echo get_user_meta($user_id, 'first_name', true).' '.get_user_meta($user_id, 'last_name', true); ?></p><?php
  else: ?>
    <p class="artist_namebis"><?php echo get_user_meta($user_id, 'public_name', true); ?></p><?php
  endif; ?>

  <p class="headline"><?php echo get_user_meta($user_id, 'headline', true);  ?></p>

  <div class="favorites">
    <a><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/favorites.png'; ?>"/> Favorites (0)</a>
  </div>

  <div class="socials">
    <a href="<?php echo get_user_meta($user_id, 'twitter', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/twitter_mail.png'; ?>"/></a>
    <a href="<?php echo get_user_meta($user_id, 'instagram', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/instagram_mail.png'; ?>"/></a>
    <a href="<?php echo get_user_meta($user_id, 'youtube', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/youtube_mail.png'; ?>"/></a>
    <a href="<?php echo get_user_meta($user_id, 'facebook', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/facebook_mail.png'; ?>"/></a>
  </div>
</div>
