<?php
function mad_candidat_infos_html(){
  global $post; ?>

  <div>
    <p class="candidat_info"><span class="label">Nom:</span> <span class="value"><?php echo get_post_meta($post->ID, 'last_name', true); ?></span></p>
    <p class="candidat_info"><span class="label">Prénom:</span> <span class="value"><?php echo get_post_meta($post->ID, 'first_name', true); ?></span></p>
    <p class="candidat_info"><span class="label">Nom d'Artiste:</span> <span class="value"><?php echo get_post_meta($post->ID, 'artist_name', true); ?></span></p>
    <p class="candidat_info"><span class="label">Ville:</span> <span class="value"><?php echo get_post_meta($post->ID, 'town', true); ?></span></p>
    <p class="candidat_info"><span class="label">Date de Naissance:</span> <span class="value"><?php echo get_post_meta($post->ID, 'birthday', true); ?></span></p>
    <p class="candidat_info"><span class="label">Email:</span> <span class="value"><?php echo get_post_meta($post->ID, 'email', true); ?></span></p>
    <p class="candidat_info"><span class="label">Présentation:</span> <span class="value"><?php echo get_post_meta($post->ID, 'introduction', true); ?></span></p>
    <p class="candidat_info"><span class="label">Présentation (fichier):</span> <span class="value"><a href="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'introduction_file', true)); ?>"><?php echo wp_get_attachment_url(get_post_meta($post->ID, 'introduction_file', true)); ?></a></span></p>
    <p class="candidat_info"><span class="label">Vidéo:</span> <span class="value"><?php echo get_post_meta($post->ID, 'video_link', true); ?></span></p>
    <p class="candidat_info"><span class="label">Description du projet:</span> <span class="value"><?php echo get_post_meta($post->ID, 'project_desc', true); ?></span></p>
    <p class="candidat_info"><span class="label">Description du projet (fichier):</span> <span class="value"><a href="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'project_desc_file', true)); ?>"><?php echo wp_get_attachment_url(get_post_meta($post->ID, 'project_desc_file', true)); ?></a></span></p>
    <p class="candidat_info"><span class="label">Comment avez-vous connu le concours ?</span> <span class="value"><?php echo get_post_meta($post->ID, 'know_about', true); ?></span></p>
  </div><?php
}
