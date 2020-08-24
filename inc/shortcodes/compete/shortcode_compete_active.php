<?php
if(!class_exists('MADActiveCompete')):
  class MADActiveCompete{
    function __construct(){
      add_shortcode('active_compete', array( $this, 'shortcode_mad_active_compete_html'));
    }

    function shortcode_mad_active_compete_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/templates/active_compete.php';
      return ob_get_clean();
    }
  }
endif;
