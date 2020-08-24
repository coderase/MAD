<?php
if(!class_exists('ArtistProject')):
  class ArtistProject{
    function __construct(){
      add_shortcode('artist_project', array( $this, 'shortcode_artist_project_html'));
    }

    function shortcode_artist_project_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/project.php';
      return ob_get_clean();
    }
  }
endif;
