<?php
function mad_compete_judges_html(){
  global $wpdb;
  global $post;

  $all_artists = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'artist' AND post_status = 'publish'"); ?>

  <div>
    <p>Juges</p>

    <?php print_r($all_artists); ?>
  </div>
  <?php
}

function mad_compete_sponsors_html(){
  global $post; ?>

  <div>
    <p>Sponsors</p>
  </div>
  <?php
}
