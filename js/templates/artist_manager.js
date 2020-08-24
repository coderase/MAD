jQuery( document ).ready(function() {
  jQuery( "#start_date" ).datepicker({
    dateFormat: "yy-mm-dd",
    firstDay: 1,
    showOtherMonths:true,
    selectOtherMonths: false,
  });

  jQuery( "#end_date" ).datepicker({
    dateFormat: "yy-mm-dd",
    firstDay: 1,
    showOtherMonths:true,
    selectOtherMonths: false,
  });
});

function update_field(id, elem){
  jQuery(id).val(jQuery(elem).val());
}

function update_product_img(id, elem){
  var reader = new FileReader();
  reader.onload = function (e) {  jQuery(id).attr('src', e.target.result ); }
  reader.readAsDataURL(elem.files[0]);
}

function update_project_img(id, elem){
  var reader = new FileReader();
  reader.onload = function (e) {  jQuery(id).css('background', 'url('+e.target.result )+');'; }
  reader.readAsDataURL(elem.files[0]);
}

function valid_product_form(){
  if(jQuery('#product_pic1').get(0).files.length == 0){ return false; }
  if(jQuery('#product_title').val().length < 3){ return false; }
  if(jQuery('#product_price').val().length < 1){ return false; }
  if(jQuery('#product_desc').val().length < 3){ return false; }
  if(jQuery('#product_who').val().length < 3){ return false; }
  if(jQuery('#product_what').val().length < 3){ return false; }
  if(jQuery('#product_category').val().length < 3){ return false; }
  if(jQuery('#product_qty').val().length < 1){ return false; }

  return true;
}

function show_product_form_error(){
  var red = '#EDABAB';

  if(jQuery('#product_pic1').get(0).files.length == 0){ alert('Choose a main picture'); }
  if(jQuery('#product_title').val().length < 3){ jQuery('#product_title').css('background', red); }else{ jQuery('#product_title').css('background', '#FFF'); }
  if(jQuery('#product_price').val().length < 1){ jQuery('#product_price').css('background', red); }else{ jQuery('#product_price').css('background', '#FFF'); }
  if(jQuery('#product_desc').val().length < 3){ jQuery('#product_desc').css('background', red); }else{ jQuery('#product_desc').css('background', '#FFF'); }
  if(jQuery('#product_who').val().length < 3){ jQuery('#product_who').css('background', red); }else{ jQuery('#product_who').css('background', '#FFF'); }
  if(jQuery('#product_what').val().length < 3){ jQuery('#product_what').css('background', red); }else{ jQuery('#product_what').css('background', '#FFF'); }
  if(jQuery('#product_category').val().length < 3){ jQuery('#product_category').css('background', red); }else{ jQuery('#product_category').css('background', '#FFF'); }
  if(jQuery('#product_qty').val().length < 1){ jQuery('#product_qty').css('background', red); }else{ jQuery('#product_qty').css('background', '#FFF'); }
}

function submit_product_form(){
  if(valid_product_form()){
    jQuery('#create_product_form').submit();
  }
  else{
    show_product_form_error();
  }
}

function add_product_to_project(){
  var product = jQuery('#product_to_add').val();
  var product_ids = jQuery('#create_project_perks').val();
  var product_delivery = jQuery('#create_project_delivery').val();
  var title = jQuery('#product_to_add option[value="'+product+'"]').attr("data-title");
  var perk_ids = product_ids.split(',');

  if(product != 'null' && !perk_ids.includes(product)){
    let delivery = prompt("Delivery ?");

    if(delivery != 'null' && delivery != ''){
      jQuery('#create_project_perks').val(product_ids+product+',');
      jQuery('#create_project_delivery').val(product_delivery+delivery+',');
      jQuery('#product_associate_list').append('<tr><td>'+title+'</td> <td>'+delivery+'</td> <td><a onclick="remove_product('+product+', this);">delete</a></td></tr>');
      jQuery('#product_associate_table').show();
    }
    else{
      alert('Please enter a Delivery !');
    }
  }
  else if(product != 'null' && perk_ids.includes(product)){
    alert('Product already associated !');
  }
  else{
    alert('Choose a product !');
  }
}

function remove_product(product, elem){
  var product_ids = jQuery('#create_project_perks').val();
  var product_delivery = jQuery('#create_project_delivery').val();
  var perk_ids = product_ids.split(',');
  var perk_delivery = product_delivery.split(',');

  for (var i = 0; i < perk_ids.length; i++) {
    if(perk_ids[i] == product){
      delete perk_ids[i];
      delete perk_delivery[i];
    }
  }

  product_ids = perk_ids.join(',')+',';
  product_delivery =  perk_delivery.join(',')+',';
  jQuery('#create_project_perks').val(product_ids);
  jQuery('#create_project_delivery').val(product_delivery);
  jQuery(elem).parent().parent().remove();
}

function valid_project_form(){
  if(jQuery('#project_name').val().length < 3){ return false; }
  if(jQuery('#project_small_desc').val().length < 3){ return false; }
  if(jQuery('#project_main_picture').get(0).files.length == 0){ return false; }
  if(jQuery('#start_date').val().length < 3){ return false; }
  if(jQuery('#end_date').val().length < 3){ return false; }
  if(jQuery('#create_project_desc').val().length < 3){ return false; }
  if(jQuery('#create_project_perks').val().length < 2){ return false; }

  return true;
}

function show_project_form_error(){
  var red = '#EDABAB';

  if(jQuery('#project_name').val().length < 3){ jQuery('#project_name').css('background', red); }else{ jQuery('#project_name').css('background', '#FFF'); }
  if(jQuery('#project_small_desc').val().length < 3){ jQuery('#project_small_desc').css('background', red); }else{ jQuery('#project_small_desc').css('background', '#FFF'); }
  if(jQuery('#project_main_picture').get(0).files.length == 0){ alert('Choose a main picture'); }
  if(jQuery('#start_date').val().length < 3){ jQuery('#start_date').css('background', red); }else{ jQuery('#start_date').css('background', '#FFF'); }
  if(jQuery('#end_date').val().length < 3){ jQuery('#end_date').css('background', red); }else{ jQuery('#end_date').css('background', '#FFF'); }
  if(jQuery('#create_project_desc').val().length < 3){ jQuery('#create_project_desc').css('background', red); }else{ jQuery('#create_project_desc').css('background', '#FFF'); }
  if(jQuery('#create_project_perks').val().length < 2){ jQuery('#product_to_add').css('background', red); }else{ jQuery('#product_to_add').css('background', '#FFF'); }
}

function submit_project_form(){
  if(valid_project_form()){
    jQuery('#create_project_form').submit();
  }
  else{
    show_project_form_error();
  }
}
