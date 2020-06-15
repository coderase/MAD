<?php
if(!class_exists('ProjectArtists')):
  class ProjectArtists{
    function __construct(){
      add_shortcode('project_artists', array( $this, 'shortcode_project_artists_html'));
    }

    function shortcode_project_artists_html($atts, $content){
      global $post;
      
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/artists.php';
      return ob_get_clean();
    }
  }
endif;
