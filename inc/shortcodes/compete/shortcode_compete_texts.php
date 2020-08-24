<?php
if(!class_exists('MADCompeteTexts')):
  class MADCompeteTexts{
    function __construct(){
      add_shortcode('compete_texts', array( $this, 'shortcode_mad_compete_texts_html'));
    }

    function shortcode_mad_compete_texts_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/templates/texts.php';
      return ob_get_clean();
    }
  }
endif;
