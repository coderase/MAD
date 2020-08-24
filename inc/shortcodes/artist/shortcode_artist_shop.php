<?php
if(!class_exists('ArtistShop')):
  class ArtistShop{
    function __construct(){
      add_shortcode('artist_shop', array( $this, 'shortcode_artist_shop_html'));
    }

    function shortcode_artist_shop_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/shop.php';
      return ob_get_clean();
    }
  }
endif;
