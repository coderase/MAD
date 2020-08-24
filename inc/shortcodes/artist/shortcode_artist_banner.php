<?php
if(!class_exists('ArtistBanner')):
  class ArtistBanner{
    function __construct(){
      add_shortcode('artist_banner', array( $this, 'shortcode_artist_banner_html'));
    }

    function shortcode_artist_banner_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/banner.php';
      return ob_get_clean();
    }
  }
endif;
