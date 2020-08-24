<?php
if(!class_exists('MADLogin')):
  class MADLogin{
    function __construct(){
      add_shortcode('mad_login', array( $this, 'shortcode_mad_login_html'));
    }

    function shortcode_mad_login_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/header/templates/login.php';
      return ob_get_clean();
    }
  }
endif;
