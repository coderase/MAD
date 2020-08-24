<?php global $post; ?>

<div id="about" class="compete_texts_section">
  <p class="title">About</p>

  <?php echo nl2br(get_post_meta($post->ID, 'compete_about_text', true)); ?>
</div>

<div id="guidelines" class="compete_texts_section">
  <p class="title">General Guidelines</p>

  <?php echo nl2br(get_post_meta($post->ID, 'compete_guidelines_text', true)); ?>
</div>

<div id="deadlines" class="compete_texts_section">
  <p class="title">Deadlines</p>

  <?php echo nl2br(get_post_meta($post->ID, 'compete_deadlines_text', true)); ?>
</div>

<div id="prizes" class="compete_texts_section">
  <p class="title">Prizes</p>

  <?php echo nl2br(get_post_meta($post->ID, 'compete_prizes_text', true)); ?>
</div>
