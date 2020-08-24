<?php global $post; ?>

<div id="judges" class="compete_texts_section">
  <p class="title">Judges</p>

  <div class="all_judges">
    <?php
    $judges = get_post_meta($post->ID, 'judges', true);

    foreach($judges as $key => $judge): ?>
      <div class="judges_box">
        <img src="<?php echo get_the_post_thumbnail_url($judge); ?>"/>
        <p class="title"><?php echo get_the_title($judge); ?></p>
        <p class="headline"><?php echo get_post_meta($judge, 'headline', true); ?></p>
      </div>
      <?php
    endforeach; ?>
  </div>
</div>
