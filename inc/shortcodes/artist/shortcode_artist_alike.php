<?php
if(!class_exists('ArtistAlike')):
  class ArtistAlike{
    function __construct(){
      add_shortcode('artist_alike', array( $this, 'shortcode_artist_alike_html'));
    }

    function shortcode_artist_alike_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/alike.php';
      return ob_get_clean();
    }
  }
endif;
