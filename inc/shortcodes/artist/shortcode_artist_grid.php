<?php
if(!class_exists('ArtistGrid')):
  class ArtistGrid{
    function __construct(){
      add_shortcode('artist_grid', array( $this, 'shortcode_artist_grid_html'));
    }

    function shortcode_artist_grid_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/grid.php';
      return ob_get_clean();
    }
  }
endif;
