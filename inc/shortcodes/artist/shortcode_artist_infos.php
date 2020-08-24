<?php
if(!class_exists('ArtistInfos')):
  class ArtistInfos{
    function __construct(){
      add_shortcode('artist_infos', array( $this, 'shortcode_artist_infos_html'));
    }

    function shortcode_artist_infos_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/infos.php';
      return ob_get_clean();
    }
  }
endif;
