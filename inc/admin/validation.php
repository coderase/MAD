<?php
global $wpdb;

if(isset($_GET['valid'])):
  $user_id = $_GET['valid'];

  update_user_meta($user_id, 'waiting', false);
  update_user_meta($user_id, 'artist', true);
  update_user_meta($user_id, 'artist_date', date('Y-m-d h:i:s'));

  if(get_user_meta($user_id, 'public_name', true) == ''):
    $public_name = get_user_meta($user->ID, 'first_name', true).' '.get_user_meta($user->ID, 'last_name', true);
  else:
    $public_name = get_user_meta($user_id, 'public_name', true);
  endif;

  //créer
  $resa_infos = array(
    'post_title'    => $public_name,
    'post_content'  => get_user_meta($user_id, 'about', true),
    'post_status'   => 'publish',
    'post_author'   => 1,
    'post_category' => array(),
    'post_type'     => 'artist',
  );
  $artist_id = wp_insert_post($resa_infos);
  $taxonomy = 'project_category';

  if(get_user_meta($user_id, 'music', true)):
    $termObjMusic  = get_term_by( 'slug', 'music', $taxonomy);
    wp_set_post_terms($artist_id, array($termObjMusic->term_id), $taxonomy);
  endif;

  if(get_user_meta($user_id, 'art', true)):
    $termObjArt  = get_term_by( 'slug', 'art', $taxonomy);
    wp_set_post_terms($artist_id, array($termObjArt->term_id), $taxonomy);
  endif;

  if(get_user_meta($user_id, 'design', true)):
    $termObjDesign  = get_term_by( 'slug', 'design', $taxonomy);
    wp_set_post_terms($artist_id, array($termObjDesign->term_id), $taxonomy);
  endif;

  update_post_meta($artist_id, 'user_associate', $user_id);
  set_post_thumbnail($artist_id, get_user_meta($user_id, 'profil_picture', true));
  update_user_meta($user_id, 'artist_id', $artist_id);

  require(PLUGIN_MAD_DIRECTORY.'inc/mails/mail_valid_profil.php');
endif;

if(isset($_GET['unvalid'])):
  $user_id = $_GET['unvalid'];

  update_user_meta($user_id, 'waiting', true);
  update_user_meta($user_id, 'waiting_date', date('Y-m-d h:i:s'));
  update_user_meta($user_id, 'artist', false);
endif;

$all_waiting_user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users INNER JOIN {$wpdb->prefix}usermeta m1 ON ( {$wpdb->prefix}users.ID = m1.user_id ) INNER JOIN {$wpdb->prefix}usermeta m2 ON ( {$wpdb->prefix}users.ID = m2.user_id ) WHERE ( m1.meta_key = 'waiting' AND m1.meta_value = 1) AND ( m2.meta_key = 'waiting_date' AND m2.meta_value != '') ORDER BY m2.meta_value DESC;");
$all_valid_user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users INNER JOIN {$wpdb->prefix}usermeta m1 ON ( {$wpdb->prefix}users.ID = m1.user_id ) INNER JOIN {$wpdb->prefix}usermeta m2 ON ( {$wpdb->prefix}users.ID = m2.user_id ) WHERE ( m1.meta_key = 'artist' AND m1.meta_value = 1) AND ( m2.meta_key = 'artist_date' AND m2.meta_value != '') ORDER BY m2.meta_value DESC;");

$valide_url = esc_url(home_url()).'/wp-admin/admin.php?page=mad_admin'; ?>

<div id="admin_validation_page">
  <div class="col">
    <p class="title">Attente de validation</p>

    <div>
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date demande</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($all_waiting_user as $key => $user): ?>
            <tr>
              <td><?php echo get_user_meta($user->ID, 'last_name', true); ?></td>
              <td><?php echo get_user_meta($user->ID, 'first_name', true); ?></td>
              <td><?php echo $user->user_email; ?></td>
              <td><?php echo get_user_meta($user->ID, 'waiting_date', true); ?></td>
              <td><a href="<?php echo esc_url(home_url()).'/preview/?artiste='.$user->ID; ?>" target="_blank">view</a></td>
              <td><a href="<?php echo $valide_url.'&valid='.$user->ID; ?>">Validate</a></td>
            </tr><?php
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col">
    <p class="title">Validé</p>

    <div>
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date demande</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($all_valid_user as $key => $user): ?>
            <tr>
              <td><?php echo get_user_meta($user->ID, 'last_name', true); ?></td>
              <td><?php echo get_user_meta($user->ID, 'first_name', true); ?></td>
              <td><?php echo $user->user_email; ?></td>
              <td><?php echo get_user_meta($user->ID, 'waiting_date', true); ?></td>
              <td><a href="<?php echo esc_url(home_url()).'/preview/?artiste='.$user->ID; ?>" target="_blank">view</a></td>
              <td><a href="<?php echo $valide_url.'&unvalid='.$user->ID; ?>">Unvalidate</a></td>
            </tr><?php
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
