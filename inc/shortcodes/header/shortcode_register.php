<?php
if(!class_exists('MADRegister')):
  class MADRegister{
    function __construct(){
      add_shortcode('mad_register', array( $this, 'shortcode_mad_register_html'));
    }

    function shortcode_mad_register_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/header/templates/register.php';
      return ob_get_clean();
    }
  }
endif;
