<?php
//Custom Metas Box
if(!function_exists('mad_add_metaboxes')):
  function mad_add_metaboxes(){
    //Project
    add_meta_box('mad_project_date', 'Plannification', 'mad_project_date_html', 'project', 'advanced', 'high');
    add_meta_box('mad_project_perks', 'Contre-parties', 'mad_project_perks_html', 'project', 'advanced', 'high');
    add_meta_box('mad_project_contribution', 'Contribution(s)', 'mad_project_contribution_html', 'project', 'advanced', 'high');
  }
endif;
add_action('add_meta_boxes', 'mad_add_metaboxes');

//Témoignages
require(PLUGIN_MAD_DIRECTORY.'inc/metas/metas_project.php');
