<?php
if(!class_exists('ProjectGrid')):
  class ProjectGrid{
    function __construct(){
      add_shortcode('project_grid', array( $this, 'shortcode_project_grid_html'));
    }

    function shortcode_project_grid_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/grid.php';
      return ob_get_clean();
    }
  }
endif;
