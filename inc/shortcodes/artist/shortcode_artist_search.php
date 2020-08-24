<?php
if(!class_exists('ArtistSearch')):
  class ArtistSearch{
    function __construct(){
      add_shortcode('artist_search', array( $this, 'shortcode_artist_search_html'));
    }

    function shortcode_artist_search_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/search.php';
      return ob_get_clean();
    }
  }
endif;
