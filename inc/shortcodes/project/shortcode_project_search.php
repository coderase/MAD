<?php
if(!class_exists('ProjectSearch')):
  class ProjectSearch{
    function __construct(){
      add_shortcode('project_search', array( $this, 'shortcode_project_search_html'));
    }

    function shortcode_project_search_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/search.php';
      return ob_get_clean();
    }
  }
endif;
