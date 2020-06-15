<?php
//Custom Metas Box
if(!function_exists('mad_add_metaboxes')):
  function mad_add_metaboxes(){
    //Project
    add_meta_box('mad_project_artist', 'Artiste', 'mad_project_artist_html', 'project', 'side', 'low');
    add_meta_box('mad_project_date', 'Plannification', 'mad_project_date_html', 'project', 'advanced', 'high');
    add_meta_box('mad_project_location', 'Localisation', 'mad_project_location_html', 'project', 'side', 'low');
    add_meta_box('mad_project_perks', 'Contre-parties', 'mad_project_perks_html', 'project', 'advanced', 'high');
    //add_meta_box('mad_project_package', 'Packages Marques', 'mad_project_package_html', 'project', 'advanced', 'high');
    add_meta_box('mad_project_contribution', 'Contribution(s)', 'mad_project_contribution_html', 'project', 'advanced', 'high');
    add_meta_box('mad_project_comments', 'Commentaire(s)', 'mad_project_comments_html', 'project', 'advanced', 'high');

    //Artist
    add_meta_box('mad_artist_infos', 'Informations', 'mad_artist_infos_html', 'artist', 'advanced', 'high');
    add_meta_box('mad_artist_metrics', 'Metrics', 'mad_artist_metrics_html', 'artist', 'side', 'low');
    add_meta_box('mad_artist_project', 'Project(s)', 'mad_artist_project_html', 'artist', 'advanced', 'high');
    add_meta_box('mad_artist_product', 'Produit(s)', 'mad_artist_product_html', 'artist', 'advanced', 'high');

    //Compete
    add_meta_box('mad_compete_judges', 'Judges', 'mad_compete_judges_html', 'compete', 'advanced', 'high');
    add_meta_box('mad_compete_sponsors', 'Sponsors', 'mad_compete_sponsors_html', 'compete', 'advanced', 'high');

  }
endif;
add_action('add_meta_boxes', 'mad_add_metaboxes');

//Project
require(PLUGIN_MAD_DIRECTORY.'inc/metas/metas_project.php');

//Artist
require(PLUGIN_MAD_DIRECTORY.'inc/metas/metas_artist.php');

//Compete
require(PLUGIN_MAD_DIRECTORY.'inc/metas/metas_compete.php');
