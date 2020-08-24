<?php
global $wpdb;

$layout = array('', '', 'span-2', '', 'span-2', '', '', '', '', 'span-2', '', '');

$all_project = $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'project' AND post_status = 'publish' ORDER BY RAND()"); ?>

<div class="grid-layout">
  <?php
  foreach ($all_project as $key => $project):
    if($atts['top'] == "1"):
      if(has_term('top', 'project_category', $project->ID )):  ?>
        <div class="grid-item  <?php echo $layout[$key]; ?> grid-item-<?php echo $key; ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($project->ID) ?>');"><a href="<?php echo get_post_permalink($project->ID); ?>"></a></div><?php
      endif;
    else:
      if(!has_term('top', 'project_category', $project->ID )):  ?>
        <div class="grid-item  <?php echo $layout[$key]; ?> grid-item-<?php echo $key; ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($project->ID) ?>');"><a href="<?php echo get_post_permalink($project->ID); ?>"></a></div><?php
      endif;
    endif;
  endforeach; ?>
</div>
