function countWords(str) {
  str = str.replace(/(^\s*)|(\s*$)/gi,"");
  str = str.replace(/[ ]{2,}/gi," ");
  str = str.replace(/\n /,"\n");
  return str.split(' ').length;
}

function change_banner(elem){
  var reader = new FileReader();
  reader.onload = function (e) {  jQuery('#page_become_artist_banner').css('background-image', 'url(' + e.target.result + ')'); }
  reader.readAsDataURL(elem.files[0]);
}

function change_profil_picture(elem){
  var reader = new FileReader();
  reader.onload = function (e) {  jQuery('#profil_picture_container').css('background-image', 'url(' + e.target.result + ')'); }
  reader.readAsDataURL(elem.files[0]);
}

function valid_save_request(){
  if(jQuery('#artist_first_name').val().length < 3){ return false; }
  if(jQuery('#artist_last_name').val().length < 3){ return false; }
  if(!validEmail(jQuery('#artist_email').val())){ return false; }

  return true;
}

function show_save_errors(){
  var red = '#EDABAB';

  if(jQuery('#artist_first_name').val().length < 3){ jQuery('#artist_first_name').css('background', red); }else{ jQuery('#artist_first_name').css('background', '#FFF'); }
  if(jQuery('#artist_last_name').val().length < 3){ jQuery('#artist_last_name').css('background', red); }else{ jQuery('#artist_last_name').css('background', '#FFF'); }
  if(!validEmail(jQuery('#artist_email').val())){ jQuery('#artist_email').css('background', red); }else{ jQuery('#artist_email').css('background', '#FFF'); }
}

function save_user_infos(){
  if(valid_save_request()){
    jQuery('#become_artist_form').submit();
  }
  else{
    show_save_errors();
  }
}

function valid_submit_request(){
  if(jQuery('#artist_first_name').val().length < 3){ return false; }
  if(jQuery('#artist_last_name').val().length < 3){ return false; }
  if(!validEmail(jQuery('#artist_email').val())){ return false; }
  if(jQuery('#artist_phone').val().length < 3){ return false; }
  if(jQuery('#artist_about').val().length < 3){ return false; }
  if(jQuery('#artist_headline').val().length < 3 || countWords(jQuery('#artist_headline').val()) > 10){ return false; }
  if(!jQuery('#artist_cat_music').is(':checked') && !jQuery('#artist_cat_art').is(':checked') && !jQuery('#artist_cat_design').is(':checked')){ return false; }

  return true;
}

function show_submit_errors(){
  var red = '#EDABAB';

  if(jQuery('#artist_first_name').val().length < 3){ jQuery('#artist_first_name').css('background', red); }else{ jQuery('#artist_first_name').css('background', '#FFF'); }
  if(jQuery('#artist_last_name').val().length < 3){ jQuery('#artist_last_name').css('background', red); }else{ jQuery('#artist_last_name').css('background', '#FFF'); }
  if(!validEmail(jQuery('#artist_email').val())){ jQuery('#artist_email').css('background', red); }else{ jQuery('#artist_email').css('background', '#FFF'); }
  if(jQuery('#artist_phone').val().length < 3){ jQuery('#artist_phone').css('background', red); }else{ jQuery('#artist_phone').css('background', '#FFF'); }
  if(jQuery('#artist_about').val().length < 3){ jQuery('#artist_about').css('background', red); }else{ jQuery('#artist_about').css('background', '#FFF'); }
  if(jQuery('#artist_headline').val().length < 3 || countWords(jQuery('#artist_headline').val()) > 10){ jQuery('#artist_headline').css('background', red); }else{ jQuery('#artist_headline').css('background', '#FFF'); }
  if(!jQuery('#artist_cat_music').is(':checked') && !jQuery('#artist_cat_art').is(':checked') && !jQuery('#artist_cat_design').is(':checked')){ jQuery('#cat_label').css('color', red); }else{ jQuery('#cat_label').css('color', '#333'); }
}

function submit_user_infos(){
  if(valid_submit_request()){
    jQuery('#become_artist_form').append('<input type="hidden" name="artist_form_submited" value="submitted"/>');
    jQuery('#become_artist_form').submit();
  }
  else{
    show_submit_errors();
  }
}
