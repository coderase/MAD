<?php
function mad_artist_infos_html(){
  global $post; ?>

  <div>
    <div>
      <label>Nom: </label>
      <input type="text" name="last_name" value="<?php echo get_post_meta($post->ID, 'last_name', true); ?>"/>
    </div>

    <div>
      <label>Prénom: </label>
      <input type="text" name="first_name" value="<?php echo get_post_meta($post->ID, 'first_name', true); ?>"/>
    </div>

    <div>
      <label>Email: </label>
      <input type="text" name="email" value="<?php echo get_post_meta($post->ID, 'email', true); ?>"/>
    </div>

    <div>
      <label>Headline: </label>
      <input type="text" name="headline" value="<?php echo get_post_meta($post->ID, 'headline', true); ?>"/>
    </div>
  </div>
  <?php
}

function mad_artist_metrics_html(){
  global $post; ?>

  <div>
    <p>Favorite: </p>
    <p>Note: </p>
    <p>Sales: </p>
  </div>
  <?php
}

function mad_artist_project_html(){
  global $wpdb;
  global $post; ?>

  <div>
    <ul>
      <?php
      foreach(ArtistManager::get_project_by_artist($post->ID) as $project): ?>
        <li><?php echo get_the_title($project->ID); ?></li><?php
      endforeach; ?>
    </ul>
  </div>

  <?php
}

function mad_artist_product_html(){
  global $wpdb;
  global $post; ?>

  <div>
    Produit
  </div>

  <?php
}

if(!function_exists('save_mad_artist_infos')):
  function save_mad_artist_infos($post_id, $post, $update){
    update_post_meta($post_id, 'last_name', @$_POST['last_name']);
    update_post_meta($post_id, 'first_name', @$_POST['first_name']);
    update_post_meta($post_id, 'email', @$_POST['email']);
    update_post_meta($post_id, 'headline', @$_POST['headline']);
  }
endif;
add_action('save_post', 'save_mad_artist_infos', 10, 3);
