<?php
$user_id =  get_post_meta($post->ID, 'user_associate', true);
$users = array();

if(get_user_meta($user_id, 'music', true)):
  $users = array_merge($users, get_objects_in_term(23, 'project_category')); //music
endif;

if(get_user_meta($user_id, 'art', true)):
  $users = array_merge($users, get_objects_in_term(24, 'project_category')); //arts
endif;

if(get_user_meta($user_id, 'design', true)):
  $users = array_merge($users, get_objects_in_term(25, 'project_category')); //design
endif;

$users = array_unique($users);
shuffle($users);  ?>

<div class="artist_section">
  <div class="header_container">
    <p class="title">Similar artists</p>

    <!--<div class="nav">
      <a><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/back.png'; ?>"/></a>
      <a><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/next.png'; ?>"/></a>
    </div>-->
  </div>

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
