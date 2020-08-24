<?php
$user_id =  get_post_meta($post->ID, 'user_associate', true) ?>

<div class="artist_infos">
  <?php
  if(empty(get_user_meta($user_id, 'public_name', true))): ?>
    <p class="artist_name"><?php echo ucfirst(get_user_meta($user_id, 'first_name', true).' '.get_user_meta($user_id, 'last_name', true)); ?></p><?php
  else: ?>
    <p class="artist_name"><?php echo ucfirst(get_user_meta($user_id, 'public_name', true)); ?></p><?php
  endif; ?>

  <p class="desc"><?php echo get_user_meta($user_id, 'about', true);  ?></p>

  <div class="share_box">
    <span>Share - </span>
    <a>Twitter</a>
    <a>Facebook</a>
  </div>
</div>
