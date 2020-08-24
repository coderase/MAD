<?php
if(!class_exists('ArtistHome')):
  class ArtistHome{
    function __construct(){
      add_shortcode('mad_home_artist', array( $this, 'shortcode_home_artist_html'));
    }

    function shortcode_home_artist_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/home_artist.php';
      return ob_get_clean();
    }
  }
endif;
