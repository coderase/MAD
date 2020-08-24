function show_edit_profil_popup(id){
  jQuery(id).css('display', 'flex');
}

function switch_to_update_infos(){
  jQuery('#step1Profil').show();
  jQuery('#step2Profil').hide();
}

function switch_to_update_password(){
  jQuery('#step1Profil').hide();
  jQuery('#step2Profil').show();
}

function valid_update_infos(){
  if(jQuery('#profil_first_name').val().length < 3){ return false; }
  if(jQuery('#profil_last_name').val().length < 3){ return false; }
  if(!validEmail(jQuery('#profil_email').val())){ return false; }

  return true;
}

function show_update_infos_error(){
  var red = '#EDABAB';

  if(jQuery('#profil_first_name').val().length < 3){ jQuery('#profil_first_name').css('background', red); }else{ jQuery('#profil_first_name').css('background', '#FFF'); }
  if(jQuery('#profil_last_name').val().length < 3){ jQuery('#profil_last_name').css('background', red); }else{ jQuery('#profil_last_name').css('background', '#FFF'); }
  if(!validEmail(jQuery('#profil_email').val())){ jQuery('#profil_email').css('background', red); }else{ jQuery('#profil_email').css('background', '#FFF'); }
}

function valid_update_password(){
  if(!jQuery('#profil_pwd').val().match(/[a-z]/g) || !jQuery('#profil_pwd').val().match(/[A-Z]/g) || !jQuery('#profil_pwd').val().match( /[0-9]/g) || !jQuery('#profil_pwd').val().match(/[^a-zA-Z\d]/g) || jQuery('#profil_pwd').val().length < 8){ return false; }
  if(jQuery('#profil_pwd').val() != jQuery('#profil_pwdbis').val()){ return false; }

  return true;
}

function show_update_password_error(){
  var red = '#EDABAB';

  if(!jQuery('#profil_pwd').val().match(/[a-z]/g) || !jQuery('#profil_pwd').val().match(/[A-Z]/g) || !jQuery('#profil_pwd').val().match( /[0-9]/g) || !jQuery('#profil_pwd').val().match(/[^a-zA-Z\d]/g) || jQuery('#profil_pwd').val().length < 8){
    jQuery('#profil_pwd').css('background', red);
    jQuery('#profil_error1').show();
  }
  else{
    jQuery('#profil_pwd').css('background', '#FFF');
    jQuery('#profil_error1').hide();
  }

  if(jQuery('#profil_pwd').val() != jQuery('#profil_pwdbis').val()){
    jQuery('#profil_pwd').css('background', red);
    jQuery('#profil_pwdbis').css('background', red);
    jQuery('#profil_error2').show();
  }
  else{
    jQuery('#profil_pwd').css('background', '#FFF');
    jQuery('#profil_pwdbis').css('background', '#FFF');
    jQuery('#profil_error2').hide();
  }
}

function update_infos(){
  if(valid_update_infos()){
    var user_id = jQuery('#profile_id').val();
    var first_name = jQuery('#profil_first_name').val();
    var last_name = jQuery('#profil_last_name').val();
    var email = jQuery('#profil_email').val();
    var phone = jQuery('#profil_phone').val();

    var parameters = [];
    parameters.push(user_id, first_name, last_name, email, phone);

    jQuery.ajax({
      url: ajaxurl,
      type: 'POST',
      async: false,
      cache: false,
      dataType: 'JSON',
      data: {action: 'updateProfile' , parameters: parameters},
      success: function(res) {
        jQuery('#step1Profil').hide();
        jQuery('.submit_message').show();
      }
    });
  }
  else{
    show_update_infos_error();
  }
}

function update_password(){
  if(valid_update_password()){
    var user_id = jQuery('#profile_id').val();
    var password = jQuery('#profil_pwd').val();

    var parameters = [];
    parameters.push(user_id, password);

    jQuery.ajax({
      url: ajaxurl,
      type: 'POST',
      async: false,
      cache: false,
      dataType: 'JSON',
      data: {action: 'updatePassword' , parameters: parameters},
      success: function(res) {
        jQuery('#step2Profil').hide();
        jQuery('.submit_message').show();
      }
    });
  }
  else{
    show_update_password_error();
  }
}
