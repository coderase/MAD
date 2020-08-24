<?php
$user_id =  get_post_meta($post->ID, 'user_associate', true); ?>

<div class="artist_categories">
  <?php
  if(get_user_meta($user_id, 'music', true)): ?>
    <a class="music cats_button">Music</a><?php
  endif;

  if(get_user_meta($user_id, 'art', true)): ?>
    <a class="arts cats_button">Arts</a><?php
  endif;

  if(get_user_meta($user_id, 'design', true)): ?>
    <a class="design cats_button">Design</a><?php
  endif; ?>
</div>
