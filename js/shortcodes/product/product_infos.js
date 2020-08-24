function change_product_qty(){
  var product_id = jQuery('#product_qty').attr('data-id');
  var product_qty = jQuery('#product_qty').val();

  var url = document.location.href.split('?')[0];
  var new_url = url+'?add-to-cart='+product_id+'&quantity='+product_qty;

  jQuery('#product_add_to_cart_button').attr('href', new_url);
}
