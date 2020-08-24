<?php
if(!class_exists('Dashboard')):
  class Dashboard{
    function __construct(){
      add_shortcode('dashboard', array( $this, 'shortcode_dashboard_html'));
    }

    function shortcode_dashboard_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/dashboard/templates/home.php';
      return ob_get_clean();
    }
  }
endif;
