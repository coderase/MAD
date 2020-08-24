<?php
if(!class_exists('MADCompeteJudges')):
  class MADCompeteJudges{
    function __construct(){
      add_shortcode('compete_judges', array( $this, 'shortcode_mad_compete_judges_html'));
    }

    function shortcode_mad_compete_judges_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/templates/judges.php';
      return ob_get_clean();
    }
  }
endif;
