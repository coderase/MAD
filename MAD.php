<?php
/*
 * Plugin Name: MAD
 * Description: V2 MAD
 * Author: Maxime PORPIGLIA
 * Text Domain: MAD
 * Domain Path: /languages
 * Version: 1.2
 */

if(!defined('ABSPATH')):
  die;
endif;

define('PLUGIN_MAD_DIRECTORY', plugin_dir_path(__FILE__));
define('PLUGIN_MAD_URL', plugins_url());

if(!class_exists('MAD')):
  class MAD{
    function __construct(){
      require(PLUGIN_MAD_DIRECTORY.'vendor/autoload.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/mad_functions.php');

      //class
      require(PLUGIN_MAD_DIRECTORY.'inc/class/project_manager.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/class/artist_manager.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/class/compete_manager.php');

      //shortcodes
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/header/shortcode_header.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/header/shortcode_login.php');

      new MADHeader();
      new MADLogin();

      //Discover
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/discover/shortcode_discover_search.php');

      new DiscoverSearch();

      //Project
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_home_project.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_perks.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_perk_selector.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_nav.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_comment.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_artist_name.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_artists.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_search.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/project/shortcode_project_grid.php');

      new ProjectHome();
      new ProjectPerks();
      new ProjectPerkSelector();
      new ProjectNav();
      new ProjectComment();
      new ProjectArtistName();
      new ProjectArtists();
      new ProjectSearch();
      new ProjectGrid();

      //Artist
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_home_artist.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_infos.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_metrics.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_categories.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_shop.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_project.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_videos.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_alike.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_grid.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_search.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/artist/shortcode_artist_banner.php');


      new ArtistHome();
      new ArtistInfos();
      new ArtistMetrics();
      new ArtistCategories();
      new ArtistShop();
      new ArtistProject();
      new ArtistVideos();
      new ArtistAlike();
      new ArtistGrid();
      new ArtistSearch();
      new ArtistBanner();

      //Product
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/shortcode_home_products.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/shortcode_products.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/shortcode_product_banner.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/shortcode_product_gallery.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/product/shortcode_product_infos.php');

      new ProductsHome();
      new Products();
      new ProductBanner();
      new ProductGallery();
      new ProductInfos();

      //Compete
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/shortcode_compete_form.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/shortcode_compete_nav.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/shortcode_compete_texts.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/shortcode_compete_judges.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/compete/shortcode_compete_active.php');

      new MADCompeteForm();
      new MADCompeteNav();
      new MADCompeteTexts();
      new MADCompeteJudges();
      new MADActiveCompete();

      //Dashboard
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/dashboard/shortcode_dashboard_links.php');
      require(PLUGIN_MAD_DIRECTORY.'inc/shortcodes/dashboard/shortcode_dashboard_popup.php');

      new DashboardLinks();
      new DashboardPopup();

      add_action('init', array($this, 'register_custom_post_type'));
      register_activation_hook( __FILE__ , array('MAD', 'install'));
      register_uninstall_hook( __FILE__ , array('MAD', 'uninstall'));
    }

    public function register_custom_post_type(){
      $mad_project_category_labels = array(
        'name' => _x( 'Categories', 'MAD' ),
        'singular_name' => _x( 'Category', 'MAD' ),
        'search_items' =>  __( 'Search Categories' ),
        'all_items' => __( 'All Categories' ),
        'parent_item' => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item' => __( 'Edit Category' ),
        'update_item' => __( 'Update Category' ),
        'add_new_item' => __( 'Add New Category' ),
        'new_item_name' => __( 'New Category Name' ),
        'menu_name' => __( 'Categories' ),
      );

      register_taxonomy('project_category', array('project'), array(
        'hierarchical' => true,
        'labels' => $mad_project_category_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categorie' ),
      ));

      //Project
      $mad_project_label = array(
        'name'            => 'Projet',
        'singular_name'   => 'Projet',
        'menu_name'       => 'Projets',
        'name_admin_bar'  => 'Projets',
        'all_items'           => __( 'Tous les Projets' ),
        'view_item'           => __( 'Voir le Projet' ),
        'add_new_item'        => __( 'Ajouter un nouveau Projet' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer le Projet' ),
        'update_item'         => __( 'Mettre à jour le Projet' ),
      );

      $mad_project_args = array(
        'labels'          => $mad_project_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-media-interactive',
        'supports'        => array('title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies'      => array('project_category'),
        'show_in_rest'    => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true
      );
      register_post_type('project', $mad_project_args);

      //Package Marque
      $mad_package_label = array(
        'name'            => 'Package Marque',
        'singular_name'   => 'Package Marque',
        'menu_name'       => 'Packages Marques',
        'name_admin_bar'  => 'Packages Marques',
        'all_items'           => __( 'Tous les Packages Marques' ),
        'view_item'           => __( 'Voir le Package Marque' ),
        'add_new_item'        => __( 'Ajouter un nouveau Package Marque' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer le Package Marque' ),
        'update_item'         => __( 'Mettre à jour le Package Marque' ),
      );

      $mad_package_args = array(
        'labels'          => $mad_package_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-cart',
        'supports'        => array('title', 'thumbnail'),
        'taxonomies'      => array(),
        'show_in_rest'    => true,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false
      );
      //register_post_type('perk', $mad_package_args);

      //Comments
      $mad_comment_label = array(
        'name'            => 'Commentaires',
        'singular_name'   => 'Commentaires',
        'menu_name'       => 'Commentaires',
        'name_admin_bar'  => 'Commentaires',
        'all_items'           => __( 'Tous les Commentaires' ),
        'view_item'           => __( 'Voir le Commentaire' ),
        'add_new_item'        => __( 'Ajouter un nouveau Commentaire' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer le Commentaire' ),
        'update_item'         => __( 'Mettre à jour le Commentaire' ),
      );

      $mad_comment_args = array(
        'labels'          => $mad_comment_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-format-chat',
        'supports'        => array('title', 'editor'),
        'taxonomies'      => array(),
        'show_in_rest'    => true,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false
      );
      register_post_type('comment', $mad_comment_args);

      //Artist
      $mad_artist_label = array(
        'name'            => 'Artistes',
        'singular_name'   => 'Artistes',
        'menu_name'       => 'Artistes',
        'name_admin_bar'  => 'Artistes',
        'all_items'           => __( 'Tous les Artistes' ),
        'view_item'           => __( 'Voir l\'Artiste' ),
        'add_new_item'        => __( 'Ajouter un nouvel Artiste' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer l\'Artiste' ),
        'update_item'         => __( 'Mettre à jour l\'Artiste' ),
      );

      $mad_artist_args = array(
        'labels'          => $mad_artist_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-admin-users',
        'supports'        => array('title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies'      => array('project_category'),
        'show_in_rest'    => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true
      );
      register_post_type('artist', $mad_artist_args);

      //Compete
      $mad_compete_label = array(
        'name'            => 'Compétitions',
        'singular_name'   => 'Compétitions',
        'menu_name'       => 'Compétitions',
        'name_admin_bar'  => 'Compétitions',
        'all_items'           => __( 'Tous les Compétitions' ),
        'view_item'           => __( 'Voir la Compétition' ),
        'add_new_item'        => __( 'Ajouter une nouvelle Compétition' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer la Compétition' ),
        'update_item'         => __( 'Mettre à jour la Compétition' ),
      );

      $mad_compete_args = array(
        'labels'          => $mad_compete_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-megaphone',
        'supports'        => array('title', 'editor', 'thumbnail'),
        'taxonomies'      => array(),
        'show_in_rest'    => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true
      );
      register_post_type('compete', $mad_compete_args);

      //Candidature
      $mad_candidat_label = array(
        'name'            => 'Candidatures',
        'singular_name'   => 'Candidatures',
        'menu_name'       => 'Candidatures',
        'name_admin_bar'  => 'Candidatures',
        'all_items'           => __( 'Toutes les Candidatures' ),
        'view_item'           => __( 'Voir la Candidature' ),
        'add_new_item'        => __( 'Ajouter une nouvelle Candidature' ),
        'add_new'             => __( 'Ajouter' ),
        'edit_item'           => __( 'Editer la Candidature' ),
        'update_item'         => __( 'Mettre à jour la Candidatures' ),
      );

      $mad_candidat_args = array(
        'labels'          => $mad_candidat_label,
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierachical'     => false,
        'menu_position'   => 3,
        'menu_icon'       => 'dashicons-admin-users',
        'supports'        => array('title'),
        'taxonomies'      => array(),
        'show_in_rest'    => true,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false
      );
      register_post_type('candidat', $mad_candidat_args);
    }

    public static function install(){
      global $wpdb;

      $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}favorites (id INT AUTO_INCREMENT PRIMARY KEY, user_id VARCHAR(255) NOT NULL, project_id VARCHAR(255), artist_id VARCHAR(255));");
    }

    public static function uninstall(){
      global $wpdb;

      $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}favorites;");
    }
  }
endif;

new MAD();
