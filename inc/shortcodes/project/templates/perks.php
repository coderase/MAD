<?php
global $post;

$all_perks = ProjectManager::get_project_perks($post->ID); ?>

<div id="perks_section">
  <p class="title"><?php echo 'Support'; ?></p>

  <div id="perks_container">
    <?php
    foreach($all_perks as $perk): ?>
      <div class="perk_box" data-price="<?php echo get_post_meta($perk["product_id"], '_price', true);  ?>">
        <p>Pledge USD <?php echo get_post_meta($perk["product_id"], '_price', true);  ?> or more</p>
        <p><?php echo get_the_title($perk["product_id"]);  ?></p>
        <p>Thank you for helping us get closer to our goal. Well raise a glass in your honor at our next company meeting!</p>
        <p>Estimated Delivery</p>
        <p><?php echo $perk["delivery"];  ?></p>
        <p>4 Backers</p>

        <div class="support_background">
          <a href="?add-to-cart=<?php echo $perk["product_id"]; ?>">Get this item</a>
        </div>
      </div>
      <?php
    endforeach; ?>

    <script>
      var divList = jQuery(".perk_box");
      divList.sort(function(a, b){
        return jQuery(a).data("price") - jQuery(b).data("price");
      });
      jQuery("#perks_container").html(divList);
    </script>
  </div>
</div>
