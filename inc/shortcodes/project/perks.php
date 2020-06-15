<?php
global $post;

$all_perks = ProjectManager::get_project_perks($post->ID); ?>

<div id="perks_section">
  <p class="title"><?php echo 'Support'; ?></p>

  <div id="perks_container">
    <?php
    foreach($all_perks as $perk): ?>
      <div class="perk_box">
        <p>Pledge USD 10 or more</p>
        <p>Gratitude</p>
        <p>Thank you for helping us get closer to our goal. Well raise a glass in your honor at our next company meeting!</p>
        <p>Estimated Delivery</p>
        <p>Dec 2020</p>
        <p>4 Backers</p>
      </div>
      <?php
    endforeach; ?>
  </div>
</div>
