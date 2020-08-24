<?php
if(!class_exists('DiscoverSearch')):
  class DiscoverSearch{
    function __construct(){
      add_shortcode('discover_search', array( $this, 'shortcode_discover_search_html'));
    }

    function shortcode_discover_search_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/discover/templates/search.php';
      return ob_get_clean();
    }
  }
endif;
