<?php
if(!class_exists('ProjectHome')):
  class ProjectHome{
    function __construct(){
      add_shortcode('mad_home_project', array( $this, 'shortcode_home_project_html'));
    }

    function shortcode_home_project_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/home_project.php';
      return ob_get_clean();
    }
  }
endif;
