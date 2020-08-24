<?php
if(!class_exists('DashboardLinks')):
  class DashboardLinks{
    function __construct(){
      add_shortcode('dashboard_link', array( $this, 'shortcode_dashboard_link_html'));
    }

    function shortcode_dashboard_link_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/dashboard/templates/links.php';
      return ob_get_clean();
    }
  }
endif;
