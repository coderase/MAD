<?php
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

  }
endif;
add_action('save_post', 'save_mad_artist_infos', 10, 3);
