<?php
function mad_admin_includes(){
  wp_enqueue_style('mad_metas_style', PLUGIN_MAD_URL.'/mad/css/admin/metas.css');
  wp_enqueue_script('mad_metas_project', PLUGIN_MAD_URL.'/mad/js/admin/metas/project.js', array( 'jquery' ));

  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
}
add_action('admin_enqueue_scripts', 'mad_admin_includes');
