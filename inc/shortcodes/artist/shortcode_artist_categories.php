<?php
if(!class_exists('ArtistCategories')):
  class ArtistCategories{
    function __construct(){
      add_shortcode('artist_categories', array( $this, 'shortcode_artist_categories_html'));
    }

    function shortcode_artist_categories_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/categories.php';
      return ob_get_clean();
    }
  }
endif;
