<?php
if(!class_exists('ArtistManager')):
  class ArtistManager{
    public static function get_project_by_artist($artist_id){
      global $wpdb;

      return $all_project = $wpdb->get_results("SELECT DISTINCT p.ID FROM {$wpdb->prefix}posts as p INNER JOIN {$wpdb->prefix}postmeta AS pm1 ON pm1.post_id = p.ID INNER JOIN {$wpdb->prefix}postmeta AS pm2 ON pm2.post_id = p.ID AND pm2.meta_key='artist' AND pm2.meta_value LIKE '$artist_id' WHERE p.post_status = 'publish' AND p.post_type = 'project' ORDER BY p.post_date DESC");
    }
  }
endif;
