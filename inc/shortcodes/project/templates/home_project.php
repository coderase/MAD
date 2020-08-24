<?php
global $wpdb;

$all_project = $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'project' AND post_status = 'publish' ORDER BY RAND() LIMIT 1"); ?>

<div id="all_projects">
  <?php
  foreach ($all_project as $key => $project): ?>
    <div class="project_container">
      <div class="col1">
        <a href="<?php echo get_the_permalink($project->ID); ?>"><img src="<?php echo get_the_post_thumbnail_url($project->ID); ?>"/></a>
      </div>

      <div class="col2">
        <p class="title"><?php echo get_the_title($project->ID); ?></p>
        <?php
        $artist_id = get_post_meta($project->ID, 'artist', true);
        $author_id = get_post_meta($artist_id, 'user_associate', true); ?>
        <p class="subtitle">By <?php echo get_user_meta($author_id, 'public_name', true); ?></p>

        <p><?php echo get_the_excerpt($project->ID); ?></p>
      </div>
    </div>
    <?php
  endforeach; ?>
</div>
