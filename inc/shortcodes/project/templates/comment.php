<?php
global $wpdb;
$current_user = wp_get_current_user();

if(isset($_POST['comment_submited'])):
  $comment_infos = array(
    'post_title'    => $current_user->user_login.' - '.date('d/m/Y'),
    'post_content'  => $_POST['project_comment_text'],
    'post_status'   => 'publish',
    'post_author'   => 1,
    'post_category' => array(),
    'post_type'     => 'comment',
  );

  $comment_id = wp_insert_post($comment_infos);

  update_post_meta($comment_id, 'post_id', $post->ID);
  update_post_meta($comment_id, 'user_id', $current_user->ID);
endif;

$all_comments = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'comment' AND post_status = 'publish' ORDER BY post_date DESC"); ?>

<div class="comment_container">
  <?php
  if(isset($_POST['comment_submited'])):
    echo '<p class="submited_message">Your comment has been submitted</p>';
  endif;

  if(is_user_logged_in()): ?>
    <form action="#" method="POST" id="project_comment_form" class="comment_form">
      <label for="project_comment_text"><?php echo __('My Comment'); ?></label>
      <textarea name="project_comment_text" id="project_comment_text"></textarea>

      <input type="hidden" name="comment_submited"/>
      <button type="submit">Envoyer</button>
    </form><?php
  endif; ?>

  <div>
    <?php
    foreach($all_comments as $comment):
      if(get_post_meta($comment_id, 'post_id', true) == $post->ID):
        echo '<p>'.$comment->post_content.'</p>';
      endif;
    endforeach; ?>
  </div>
</div>
