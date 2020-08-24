jQuery( document ).ready(function() {
  jQuery(".support_process_popup").on('click', function(){
    jQuery(".support_process_popup").css('display', 'none');
  });

  jQuery(".popup_content").on('click', function(e){
    e.stopPropagation();
  });
});

function change_perk_button(){
  var perk_id = jQuery('#perk_selector_id').val();
  var url = document.location.href.split('?')[0];
  var new_url = url+'?add-to-cart='+perk_id;

  jQuery('#perk_add_to_cart_button').attr('href', new_url);
}

function show_support_popup_by_selector(){
  jQuery('.support_process_popup').css('display', 'flex');
}
