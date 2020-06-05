<?php
if(!class_exists('MADHeader')):
  class MADHeader{
    function __construct(){
      add_shortcode('mad_header', array( $this, 'shortcode_mad_header_html'));
    }

    function shortcode_mad_header_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/header/header.php';
      return ob_get_clean();
    }
  }
endif;
