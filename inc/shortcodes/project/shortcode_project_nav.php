<?php
if(!class_exists('ProjectNav')):
  class ProjectNav{
    function __construct(){
      add_shortcode('project_nav', array( $this, 'shortcode_project_nav_html'));
    }

    function shortcode_project_nav_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/nav.php';
      return ob_get_clean();
    }
  }
endif;
