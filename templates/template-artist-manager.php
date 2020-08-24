<?php
get_header();

$artist_manager_url = esc_url(home_url()).'/artist-manager/';
$user = wp_get_current_user();
$user_id = $user->ID; ?>

<div id="artist_manager_page">
  <div class="artist_banner">
    <img src="<?php echo wp_get_attachment_url(get_user_meta($user_id, 'banner', true)); ?>"/>
    <a href="<?php echo esc_url(home_url()).'/dashboard/become-an-artist/'; ?>">Edit Artist Profile</a>
  </div>

  <div class="artist_nav">
    <ul>
      <li <?php echo (!isset($_GET['competes']) AND !isset($_GET['store'])AND !isset($_GET['create-product']) AND !isset($_GET['campaigns']) AND !isset($_GET['featured']))? 'class="active"' : ''; ?>><a href="<?php echo $artist_manager_url; ?>">Projects</a></li>
      <li <?php echo (isset($_GET['competes']))? 'class="active"' : ''; ?>><a href="<?php echo $artist_manager_url.'?competes=1'; ?>">Competitions</a></li>
      <li <?php echo (isset($_GET['store']) OR isset($_GET['create-product']))? 'class="active"' : ''; ?>><a href="<?php echo $artist_manager_url.'?store=1'; ?>">Store</a></li>
      <li <?php echo (isset($_GET['campaigns']))? 'class="active"' : ''; ?>><a href="<?php echo $artist_manager_url.'?campaigns=1'; ?>">Campaigns</a></li>
      <li <?php echo (isset($_GET['featured']))? 'class="active"' : ''; ?>><a href="<?php echo $artist_manager_url.'?featured=1'; ?>">Featured Content</a></li>
    </ul>
  </div>

  <div id="artist_content">
    <?php require(PLUGIN_MAD_DIRECTORY.'templates/artist_manager/project.php'); ?>
    <?php require(PLUGIN_MAD_DIRECTORY.'templates/artist_manager/create_project.php'); ?>

    <div id="artist_compete" class="content" <?php echo (!isset($_GET['competes']))? 'style="display: none;"' : ''; ?>>
      <p>Comming soon</p>
    </div>

    <div id="artist_store" class="content" <?php echo (!isset($_GET['store']))? 'style="display: none;"' : ''; ?>>
      <a href="<?php echo $artist_manager_url.'?create-product=1'; ?>">Create your product</a>
    </div>

    <?php require(PLUGIN_MAD_DIRECTORY.'templates/artist_manager/create_product.php'); ?>

    <div id="artist_campaigns" class="content" <?php echo (!isset($_GET['campaigns']))? 'style="display: none;"' : ''; ?>>
      <p>Comming soon</p>
    </div>

    <div id="artist_featured" class="content" <?php echo (!isset($_GET['featured']))? 'style="display: none;"' : ''; ?>>
      <p>Comming soon</p>
    </div>
  </div>
</div>

<?php
get_footer();
