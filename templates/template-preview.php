<?php
get_header();

$artist_id = $_GET['artiste']; ?>

<div id="preview_page">
  <div class="banner">
    <img src="<?php echo wp_get_attachment_url(get_user_meta($artist_id, 'banner', true)); ?>"/>
  </div>

  <div class="artist_cats">
    <?php
    if(get_user_meta($artist_id, 'music', true)): ?>
      <a class="music cats_button">Music</a><?php
    endif;

    if(get_user_meta($artist_id, 'art', true)): ?>
      <a class="arts cats_button">Arts</a><?php
    endif;

    if(get_user_meta($artist_id, 'design', true)): ?>
      <a class="design cats_button">Design</a><?php
    endif; ?>
  </div>

  <div class="artist_infos">
    <div class="col1">
      <?php
      if(empty(get_user_meta($artist_id, 'public_name', true))): ?>
        <p class="artist_name"><?php echo ucfirst(get_user_meta($artist_id, 'first_name', true).' '.get_user_meta($artist_id, 'last_name', true)); ?></p><?php
      else: ?>
        <p class="artist_name"><?php echo ucfirst(get_user_meta($artist_id, 'public_name', true)); ?></p><?php
      endif; ?>

      <p class="desc"><?php echo get_user_meta($artist_id, 'about', true);  ?></p>

      <div class="share_box">
        <span>Share - </span>
        <a>Twitter</a>
        <a>Facebook</a>
      </div>
    </div>

    <div class="col2">
      <div class="metrics_box">
        <?php
        if(empty(get_user_meta($artist_id, 'public_name', true))): ?>
          <p class="artist_namebis"><?php echo get_user_meta($artist_id, 'first_name', true).' '.get_user_meta($artist_id, 'last_name', true); ?></p><?php
        else: ?>
          <p class="artist_namebis"><?php echo get_user_meta($artist_id, 'public_name', true); ?></p><?php
        endif; ?>

        <p class="headline"><?php echo get_user_meta($artist_id, 'headline', true);  ?></p>

        <div class="favorites">
          <a><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/favorites.png'; ?>"/> Favorites (0)</a>
        </div>

        <div class="socials">
          <a href="<?php echo get_user_meta($artist_id, 'twitter', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/twitter_mail.png'; ?>"/></a>
          <a href="<?php echo get_user_meta($artist_id, 'instagram', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/instagram_mail.png'; ?>"/></a>
          <a href="<?php echo get_user_meta($artist_id, 'youtube', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/youtube_mail.png'; ?>"/></a>
          <a href="<?php echo get_user_meta($artist_id, 'facebook', true);  ?>"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/facebook_mail.png'; ?>"/></a>
        </div>
      </div>
    </div>
  </div>

  <div class="shop">
    <p class="title">Shop</p>
    <p>No product available yet</p>
  </div>

  <div class="projects">
    <p class="title">Project</p>
    <p>No project available yet</p>
  </div>

  <div class="others">
    <p class="title">Similar Artists</p>

    <div>
      <?php
      $users = array();

      if(get_user_meta($artist_id, 'music', true)):
        $users = array_merge($users, get_objects_in_term(23, 'project_category')); //music
      endif;

      if(get_user_meta($artist_id, 'art', true)):
        $users = array_merge($users, get_objects_in_term(24, 'project_category')); //arts
      endif;

      if(get_user_meta($artist_id, 'design', true)):
        $users = array_merge($users, get_objects_in_term(25, 'project_category')); //design
      endif;

      $users = array_unique($users);
      shuffle($users);  ?>

      <div class="alike_section">
        <?php
        $index = 1;
        foreach($users as $user):
          if(get_post_type($user) == 'artist' AND get_post_status($user) == 'publish'): ?>
            <div class="alike_box" style="background: url('<?php echo get_the_post_thumbnail_url($user); ?>')"><a href="<?php echo get_post_permalink($user); ?>"></a></div><?php
            $index = $index +1;
          endif;

          if($index > 3):
            break;
          endif;
        endforeach; ?>
      </div>
    </div>
  </div>
<div>
<?php
get_footer();
