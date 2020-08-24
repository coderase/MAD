<?php
if(!class_exists('ProjectArtistName')):
  class ProjectArtistName{
    function __construct(){
      add_shortcode('project_artist_name', array( $this, 'shortcode_project_artist_name_html'));
    }

    function shortcode_project_artist_name_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/artist_name.php';
      return ob_get_clean();
    }
  }
endif;
