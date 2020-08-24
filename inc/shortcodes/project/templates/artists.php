<div class="artist_box">
  <p class="title">Discover Artist</p>

  <div class="project_artist_img" style="background: url('<?php echo get_the_post_thumbnail_url(get_post_meta($post->ID, 'artist', true)); ?>');"></div>
  <p class="artist_name"><?php echo get_the_title(get_post_meta($post->ID, 'artist', true)); ?></p>
</div>
