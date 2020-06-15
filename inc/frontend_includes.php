<?php
function mad_frontend_includes(){
  wp_enqueue_style('mad_style', PLUGIN_MAD_URL.'/MAD/css/style.css');

  //Shortcodes
  wp_enqueue_script('mad_shortcode_project_nav', PLUGIN_MAD_URL.'/MAD/js/shortcodes/project/nav.js', array( 'jquery' ));

  wp_enqueue_media();
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
}
add_action('wp_enqueue_scripts', 'mad_frontend_includes');
