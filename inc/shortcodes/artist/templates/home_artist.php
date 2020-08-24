<?php
global $wpdb;

$layout = array('', '', 'span-2', '', 'span-2', '', '', '', '', 'span-2', '', '', '', 'span-2', '', 'span-2', '', '', '', '', 'span-2', '', '', '', '', 'span-2');
$all_artist = $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'artist' AND post_status = 'publish' ORDER BY RAND() LIMIT 33"); ?>

<div id="home_artist_container" class="grid-layout">
  <?php
  foreach ($all_artist as $key => $artist): ?>
    <div class="grid-item  <?php echo $layout[$key]; ?> grid-item-<?php echo $key; ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($artist->ID) ?>'); border-radius: 0 !important;">
      <a href="<?php echo get_post_permalink($artist->ID); ?>"></a>
    </div><?php
  endforeach; ?>
</div>
