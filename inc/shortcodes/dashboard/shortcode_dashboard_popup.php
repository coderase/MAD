<?php
if(!class_exists('DashboardPopup')):
  class DashboardPopup{
    function __construct(){
      add_shortcode('dashboard_popup', array( $this, 'shortcode_dashboard_popup_html'));
    }

    function shortcode_dashboard_popup_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/dashboard/templates/popup.php';
      return ob_get_clean();
    }
  }
endif;
