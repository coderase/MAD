<?php
if(!class_exists('ProjectManager')):
  class ProjectManager{
    public static function get_all_project(){
      global $wpdb;

      return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'project' AND post_status = 'publish'");
    }

    public static function get_all_products(){
      global $wpdb;

      return $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status = 'publish'");
    }

    public static function get_project_perks($project_id){
      return get_post_meta($project_id, 'perks', true);
    }

    public static function get_project_comments($project_id){
      global $wpdb;
    }

    public static function get_project_contributions($project_id){
      global $wpdb;
    }
  }
endif;
