<?php
if(!class_exists('ProjectPerkSelector')):
  class ProjectPerkSelector{
    function __construct(){
      add_shortcode('project_perk_selector', array( $this, 'shortcode_project_perk_selector_html'));
    }

    function shortcode_project_perk_selector_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/perk_selector.php';
      return ob_get_clean();
    }
  }
endif;
