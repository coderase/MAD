<?php
if(!class_exists('ProjectPerks')):
  class ProjectPerks{
    function __construct(){
      add_shortcode('project_perks', array( $this, 'shortcode_project_perks_html'));
    }

    function shortcode_project_perks_html($atts, $content){
      global $post;

      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/perks.php';
      return ob_get_clean();
    }
  }
endif;
