<?php
if(!class_exists('ArtistMetrics')):
  class ArtistMetrics{
    function __construct(){
      add_shortcode('artist_metrics', array( $this, 'shortcode_artist_metrics_html'));
    }

    function shortcode_artist_metrics_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/metrics.php';
      return ob_get_clean();
    }
  }
endif;
