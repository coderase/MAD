<?php
if(!class_exists('FavoritesManager')):
  class FavoritesManager{
    public static function get_project_favorites($project_id){
      global $wpdb;

      return $all_favorites = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}favorites WHERE project_id == '$project_id'");
    }

    public static function get_artist_favorites($artist_id){
      global $wpdb;

      return $all_favorites = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}favorites WHERE artist_id == '$artist_id'");
    }
  }
endif;
