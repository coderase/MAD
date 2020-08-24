<?php
global $wpdb;

$all_compete = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'compete' AND post_status = 'publish'");  ?>

<div id="active_compete_container">
  <?php
  foreach ($all_compete as $key => $compete): ?>
    <div class="active_compete_box"><a href="<?php echo get_post_permalink($compete->ID); ?>"><img src="<?php echo get_the_post_thumbnail_url($compete->ID) ?>"/></a></div><?php
  endforeach; ?>
</div>
