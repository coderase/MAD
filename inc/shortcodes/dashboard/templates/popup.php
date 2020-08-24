<?php
$user_id = wp_get_current_user()->ID; ?>

<div id="become_artist_popup" class="popup">
  <div class="content">
    <p class="title">Create your MAD Artist Profile</p>

    <p>You are one step away to acces all features available to Artists !</p>
    <p>Please complete and submit your artist profile to be referenced publicly</p>

    <a class="become_an_artist_button" onclick="become_artist(<?php echo $user_id; ?>);">Continue</a>
  </div>
</div>
