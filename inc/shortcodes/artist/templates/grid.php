<?php
global $wpdb;

$layout = array('', '', 'span-2', '', 'span-2', '', '', '', '', 'span-2', '', '', '', 'span-2', '', 'span-2', '', '', '', '', 'span-2', '', '', '', '', 'span-2');

$all_artist = $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'artist' AND post_status = 'publish' ORDER BY RAND()"); ?>

<div class="grid-layout">
  <?php
  foreach ($all_artist as $key => $artist):
    if($atts['top'] == "1"):
      if(has_term('top', 'project_category', $artist->ID )):  ?>
        <div class="grid-item  <?php echo $layout[$key]; ?> grid-item-<?php echo $key; ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($artist->ID) ?>');"><a href="<?php echo get_post_permalink($artist->ID); ?>"></a></div><?php
      endif;
    else:
      if(!has_term('top', 'project_category', $artist->ID )):  ?>
        <div class="grid-item  <?php echo $layout[$key]; ?> grid-item-<?php echo $key; ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($artist->ID) ?>');"><a href="<?php echo get_post_permalink($artist->ID); ?>"></a></div><?php
      endif;
    endif;
  endforeach; ?>
</div>
