<?php
if(!class_exists('MADCompeteForm')):
  class MADCompeteForm{
    function __construct(){
      add_shortcode('compete_form', array( $this, 'shortcode_mad_compete_form_html'));
    }

    function shortcode_mad_compete_form_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/templates/form.php';
      return ob_get_clean();
    }
  }
endif;
