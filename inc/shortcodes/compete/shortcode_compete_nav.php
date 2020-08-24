<?php
if(!class_exists('MADCompeteNav')):
  class MADCompeteNav{
    function __construct(){
      add_shortcode('compete_nav', array( $this, 'shortcode_mad_compete_nav_html'));
    }

    function shortcode_mad_compete_nav_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/templates/nav.php';
      return ob_get_clean();
    }
  }
endif;
