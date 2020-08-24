<?php
function mad_frontend_includes(){
  wp_enqueue_style('mad_style', PLUGIN_MAD_URL.'/MAD/css/style.css');

  //Shortcodes
  wp_enqueue_script('mad_shortcode_project_nav', PLUGIN_MAD_URL.'/MAD/js/shortcodes/project/nav.js', array( 'jquery' ));
  wp_enqueue_script('mad_shortcode_project_perk_selector', PLUGIN_MAD_URL.'/MAD/js/shortcodes/project/perk_selector.js', array( 'jquery' ));
  wp_enqueue_script('mad_shortcode_project_perks', PLUGIN_MAD_URL.'/MAD/js/shortcodes/project/perks.js', array( 'jquery' ));
  wp_enqueue_script('mad_shortcode_project_comment', PLUGIN_MAD_URL.'/MAD/js/shortcodes/project/comment.js', array( 'jquery' ));

  wp_enqueue_script('mad_shortcode_product_infos', PLUGIN_MAD_URL.'/MAD/js/shortcodes/product/product_infos.js', array( 'jquery' ));

  wp_enqueue_script('mad_shortcode_compete_form', PLUGIN_MAD_URL.'/MAD/js/shortcodes/compete/form.js', array( 'jquery' ));
  wp_enqueue_script('mad_shortcode_compete_nav', PLUGIN_MAD_URL.'/MAD/js/shortcodes/compete/nav.js', array( 'jquery' ));

  wp_enqueue_script('mad_shortcode_artist_search', PLUGIN_MAD_URL.'/MAD/js/shortcodes/search.js', array( 'jquery' ));

  wp_enqueue_script('mad_shortcode_login', PLUGIN_MAD_URL.'/MAD/js/shortcodes/header/login.js', array( 'jquery' ));
  wp_enqueue_script('mad_shortcode_header', PLUGIN_MAD_URL.'/MAD/js/shortcodes/header/header.js', array( 'jquery' ));

  wp_enqueue_script('mad_shortcode_dashboard_links', PLUGIN_MAD_URL.'/MAD/js/shortcodes/dashboard/links.js', array( 'jquery' ));
  wp_enqueue_script('mad_shortcode_dashboard_popup', PLUGIN_MAD_URL.'/MAD/js/shortcodes/dashboard/popup.js', array( 'jquery' ));

  wp_enqueue_script('mad_become_artist', PLUGIN_MAD_URL.'/MAD/js/templates/become_an_artist.js', array( 'jquery' ));
  wp_enqueue_script('mad_forgot_password', PLUGIN_MAD_URL.'/MAD/js/templates/forgot_password.js', array( 'jquery' ));
  wp_enqueue_script('mad_profil', PLUGIN_MAD_URL.'/MAD/js/templates/profil.js', array( 'jquery' ));
  wp_enqueue_script('mad_artist_manager', PLUGIN_MAD_URL.'/MAD/js/templates/artist_manager.js', array( 'jquery' ));

  wp_enqueue_media();
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
}
add_action('wp_enqueue_scripts', 'mad_frontend_includes');
