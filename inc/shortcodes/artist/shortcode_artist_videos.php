<?php
if(!class_exists('ArtistVideos')):
  class ArtistVideos{
    function __construct(){
      add_shortcode('artist_videos', array( $this, 'shortcode_artist_videos_html'));
    }

    function shortcode_artist_videos_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/templates/videos.php';
      return ob_get_clean();
    }
  }
endif;
