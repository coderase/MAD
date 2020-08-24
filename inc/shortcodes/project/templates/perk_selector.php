<?php
global $post;

$all_perks = ProjectManager::get_project_perks($post->ID); ?>

<div class="perk_selector_container">
  <p class="title"><?php echo __('Choose an item'); ?></p>

  <select class="perk_selector" id="perk_selector_id" onchange="change_perk_button();">
    <?php
    $index = 1;
    $perk_id = '';

    foreach($all_perks as $perk):
      if($index == 1):
        $perk_id = $perk["product_id"];
      endif;  ?>
      <option value="<?php echo $perk["product_id"]; ?>" class="perk_selector_item" data-price="<?php echo get_post_meta($perk["product_id"], '_price', true);  ?>"><?php echo get_the_title($perk["product_id"]); ?> ( <?php echo get_post_meta($perk["product_id"], '_price', true);  ?> USD)</option><?php

      $index ++;
    endforeach; ?>
  </select>

  <script>
    var divList = jQuery(".perk_selector_item");
    divList.sort(function(a, b){
      return jQuery(a).data("price") - jQuery(b).data("price");
    });
    jQuery(".perk_selector").html(divList);
  </script>

  <!-- <a onclick="show_support_popup_by_selector();"><?php echo __('Add to cart'); ?></a> -->
  <a id="perk_add_to_cart_button" href="?add-to-cart=<?php echo $perk_id; ?>"><?php echo __('Add to cart'); ?></a>
</div>

<div class="support_process_popup">
  <div class="popup_content">
    <p>Go to checkout</p>

    <a>Continue as a guest</a>

    <p>OR</p>

    <div>
      <p>Sign in or register</p>

      <div>
        <label>Email adress</label>
        <input type="email"/>
      </div>

      <button>Continue</button>
    <div>

    <p>OR</p>

    <a>Google button</a>
    <a>Facebook button</a>

    <p class="rgpd_text">
      By clicking Continue with Google or Continue with Facebook, you agree to MAD's <a>Terms of Use</a> and <a>Privacy policy</a>.
      MAD may send you communications; you may change your preferences in your account seetings. We'll never post without your permission.
    </p>
  </div>
</div>
