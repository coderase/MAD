<?php
if(!class_exists('ProjectComment')):
  class ProjectComment{
    function __construct(){
      add_shortcode('project_comment', array( $this, 'shortcode_project_comment_html'));
    }

    function shortcode_project_comment_html($atts, $content){
      ob_start();
      include PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/templates/comment.php';
      return ob_get_clean();
    }
  }
endif;
