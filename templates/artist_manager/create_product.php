<?php
$user = wp_get_current_user();
$user_id = $user->ID;

if(isset($_POST['create_product']) AND $_POST['create_product'] == 'submitted'):
  //$objProduct = new WC_Product_Download();   if download product
  $objProduct = new WC_Product();
  $objProduct->set_status("draft");
  $objProduct->set_catalog_visibility('visible');
  $objProduct->set_name($_POST['create_product_title']);
  $objProduct->set_price($_POST['create_product_price']);
  $objProduct->set_regular_price($_POST['create_product_price']);
  $objProduct->set_description($_POST['create_product_desc']);
  $objProduct->set_sku('');
  $objProduct->set_manage_stock(true);
  $objProduct->set_stock_quantity($_POST['create_product_qty']);
  $objProduct->set_stock_status('instock'); // in stock or out of stock value
  $objProduct->set_backorders('no');
  $objProduct->set_reviews_allowed(false);
  $objProduct->set_sold_individually(false);

  //Thumbnail
  if(!function_exists('wp_generate_attachment_metadata')):
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
  endif;

  if(isset($_FILES['product_pic1']) and strlen($_FILES['product_pic1']['name']) > 3):
    if(0 === $_FILES['product_pic1']['error']) :
       $thumbnail_id = media_handle_upload('product_pic1', 0);
       $objProduct->set_image_id($thumbnail_id);
    endif;
  endif;

  //Galery
  $productImagesIDs = array();

  for ($i=2; $i <= 10; $i++):
    if(isset($_FILES['product_pic'.$i]) and strlen($_FILES['product_pic'.$i]['name']) > 3):
      if(0 === $_FILES['product_pic'.$i]['error']) :
         $thumbnail_id = media_handle_upload('product_pic'.$i, 0);
         $productImagesIDs[] = $thumbnail_id;
      endif;
    endif;
  endfor;

  if(count($productImagesIDs) > 1):
    $objProduct->set_gallery_image_ids($productImagesIDs);
  endif;

  $product_id = $objProduct->save();
  update_post_meta($product_id, 'user_associate', $user_id);
  update_post_meta($product_id, 'product_who', $_POST['create_product_who']);
  update_post_meta($product_id, 'product_what', $_POST['create_product_what']); ?>

  <div class="popup" style="display: flex;">
    div class="content" style="width: 500px !important;">
      <div>
        <img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/thankyou.png'; ?>" style="width: calc(100% + 68px); max-width: calc(100% + 68px); margin: -24px -30px 0px -34px;"/>
      </div>

      <p style="font-weight: bold; font-size: 20px; text-align: center;">Your inquiry has been sent !</p>
      <p>Our team will get back to you as soon as possible ragarding your request.</p>

      <a href="<?php echo esc_url(home_url()).'/artist-manager/?store=1'; ?>" class="become_an_artist_button">Products</a>
    </div>
  </div><?php
endif;  ?>

<div id="create_product" class="content" <?php echo (!isset($_GET['create-product']))? 'style="display: none;"' : ''; ?>>
  <p class="main_title">Add a new product</p>

  <div class="create_product_box">
    <p class="title">Photos</p>
    <p class="note">add as many as you can so buyers can see every detail.</p>

    <div class="container">
      <div class="col1">
        <p class="subtitle">Photos*</p>

        <p class="infos">Use up to ten photos to show your item's most important qualities</p>
        <p class="infos">Tips:</p>

        <ul>
          <li class="infos">- Use natural light and no flesh</li>
          <li class="infos">- Include a common object for scale</li>
          <li class="infos">- Show the item being held, worn, or used</li>
          <li class="infos">- Shoot against the clean, simple background</li>
        </ul>
      </div>

      <div class="col2">
        <div class="create_product_img">
          <div><label for="product_pic1"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product1.png'; ?>" id="product_img1"/></label></div>
          <div><label for="product_pic2"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product2.png'; ?>" id="product_img2"/></label></div>
          <div><label for="product_pic3"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product3.png'; ?>" id="product_img3"/></label></div>
          <div><label for="product_pic4"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product4.png'; ?>" id="product_img4"/></label></div>
          <div><label for="product_pic5"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product5.png'; ?>" id="product_img5"/></label></div>
          <div><label for="product_pic6"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product6.png'; ?>" id="product_img6"/></label></div>
          <div><label for="product_pic7"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product7.png'; ?>" id="product_img7"/></label></div>
          <div><label for="product_pic8"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product8.png'; ?>" id="product_img8"/></label></div>
          <div><label for="product_pic9"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product9.png'; ?>" id="product_img9"/></label></div>
          <div><label for="product_pic10"><img src="<?php echo PLUGIN_MAD_URL.'/MAD/img/create_product10.png'; ?>" id="product_img10"/></label></div>
        </div>
      </div>
    </div>
  </div>

  <div class="create_product_box">
    <p class="title">Listing Details</p>
    <p class="note">Tell the world all about your item and why they'll love it.</p>

    <div class="container">
      <div class="col1">
        <label for="product_title" class="subtitle">Title*</label>
        <p class="infos">Include keywords that buyer would use to search your item.</p>
      </div>

      <div class="col2">
        <input type="text" name="product_title" id="product_title" onchange="update_field('#create_product_title', this);"/>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">About the listing*</label>
        <p class="infos"><a>Learn more about what type of items are allowed on MAD</a></p>
      </div>

      <div class="col2">
        <div class="product_who_what">
          <input type="text" name="product_who" id="product_who" placeholder="Who made it?">
          <input type="text" name="product_what" id="product_what" placeholder="What is it?">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Category*</label>
        <p class="infos">Type two or three words description of your product to get category suggestions that will help more shoppers to find it.</p>
      </div>

      <div class="col2">
        <input type="text" name="product_category" id="product_category" placeholder="painting, earrings, song"/>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Type*</label>
      </div>

      <div class="col2">
        <div class="product_type_container">
          <div class="product_type">
            <div>
              <input type="radio" name="product_type" id="product_type" value="physical" checked/>
            </div>

            <div>
              <label>Physical</label>
              <p class="infos">A tangible item that will ship to buyers.</p>
            </div>
          </div>

          <div class="product_type">
            <div>
              <input type="radio" name="product_type" id="product_type" value="digital"/>
            </div>

            <div>
              <label>Digital</label>
              <p class="infos">A digital item that buyers will download.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Description*</label>
        <p class="infos">start with a brief overview that describes your item's finest features. Shoppers will only see the first few lines of your description at first, so make it count!</p>
        <p class="infos">Not sure what else to say?</br> Shoppers also like hearing about your process, and the story behind this item.</p>
      </div>

      <div class="col2">
        <textarea name="product_desc" id="product_desc" onchange="update_field('#create_product_desc', this);"></textarea>
      </div>
    </div>
  </div>

  <div class="create_product_box">
    <p class="title">Inventory and pricing</p>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Price(€)*</label>
        <p class="infos">Factor in the costs of materials and labor, plus any related business expenses.</br> Consider the total price buyers will pay too - including shipping</p>
      </div>

      <div class="col2">
        <input type="text" name="product_price" id="product_price" onchange="update_field('#create_product_price', this);"/>
      </div>
    </div>

    <div class="container">
      <div class="col1">
        <label class="subtitle">Quantity*</label>
        <p class="infos">For quantities greater than one, the listing will renew automatically until it sell out.</p>
      </div>

      <div class="col2">
        <input type="number" name="product_qty" id="product_qty" min="1" value="1" onchange="update_field('#create_product_qty', this);"/>
      </div>
    </div>
  </div>

  <div id="create_product_buttons">
    <!-- <a href="#" target="_blank" class="preview">Preview</a> -->
    <a onclick="submit_product_form();">Submit</a>
  </div>

  <form action="#" method="post" enctype="multipart/form-data" id="create_product_form">
    <input type="hidden" name="create_product_title" id="create_product_title"/>
    <input type="hidden" name="create_product_desc" id="create_product_desc"/>
    <input type="hidden" name="create_product_price" id="create_product_price"/>
    <input type="hidden" name="create_product_qty" id="create_product_qty"/>

    <input type="file" name="product_pic1" id="product_pic1" style="display: none;" onchange="update_product_img('#product_img1', this);"/>
    <input type="file" name="product_pic2" id="product_pic2" style="display: none;" onchange="update_product_img('#product_img2', this);"/>
    <input type="file" name="product_pic3" id="product_pic3" style="display: none;" onchange="update_product_img('#product_img3', this);"/>
    <input type="file" name="product_pic4" id="product_pic4" style="display: none;" onchange="update_product_img('#product_img4', this);"/>
    <input type="file" name="product_pic5" id="product_pic5" style="display: none;" onchange="update_product_img('#product_img5', this);"/>
    <input type="file" name="product_pic6" id="product_pic6" style="display: none;" onchange="update_product_img('#product_img6', this);"/>
    <input type="file" name="product_pic7" id="product_pic7" style="display: none;" onchange="update_product_img('#product_img7', this);"/>
    <input type="file" name="product_pic8" id="product_pic8" style="display: none;" onchange="update_product_img('#product_img8', this);"/>
    <input type="file" name="product_pic9" id="product_pic9" style="display: none;" onchange="update_product_img('#product_img9', this);"/>
    <input type="file" name="product_pic10" id="product_pic10" style="display: none;" onchange="update_product_img('#product_img10', this);"/>

    <input type="hidden" name="create_product" value="submitted"/>
  </form>
</div>
