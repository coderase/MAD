function login_request(){
  var valid = true;
  var parameters = [];
  parameters.push(jQuery('#log_id').val());

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    async: false,
    cache: false,
    dataType: 'JSON',
    data: {action: 'isUserActivated' , parameters: parameters},
    success: function(res) {
      if(!res.activated && res.email_exist){
        valid = false;
        jQuery('#notActivatedText').show();
      }
    }
  });

  parameters.push(jQuery('#pwd').val());

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    async: false,
    cache: false,
    dataType: 'JSON',
    data: {action: 'passwordMatch' , parameters: parameters},
    success: function(res) {
      if(!res.match){
        valid = false;
        jQuery('#passwordNotMatchText').show();
      }
    }
  });

  if(valid){  jQuery('#loginform').submit();  }
}

function validEmail(email){
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function emailExists(email){
  var parameters = [];
  parameters.push(email);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    async: false,
    cache: false,
    dataType: 'JSON',
    data: {action: 'emailExists' , parameters: parameters},
    success: function(res) {
      if(res.exist){
        return true;
      }
      else{
        return false;
      }
    }
  });
}

function valid_login_request(){
  if(jQuery('#log_id').val().length < 3){ return false; }
  if(jQuery('#pwd').val().length < 3){ return false; }

  return true;
}

function show_login_error(){
  var red = '#EDABAB';

  if(jQuery('#log_id').val().length < 3){ jQuery('#log_id').css('background', red); }
  if(jQuery('#pwd').val().length < 3){ jQuery('#pwd').css('background', red); }
}

jQuery( document ).ready(function() {
  jQuery(".popup").on('click', function(){
    reset_login_form();
    jQuery(".popup").css('display', 'none');
  });

  jQuery(".content").on('click', function(e){
    e.stopPropagation();
  });

  jQuery('#loginform').on('submit', function(event){
    if(!valid_login_request()){
      event.preventDefault();
      show_login_error();
    }
  });
});

function show_popup(id){
  jQuery(id).css('display', 'flex');
}

function hide_popup(id){
  reset_login_form();
  jQuery(id).css('display', 'none');
}

function switch_to_register_form(){
  jQuery('#notActivatedText').hide();
  jQuery('#passwordNotMatchText').hide();

  jQuery('.login').hide();
  jQuery('.forgot').hide();
  jQuery('.register').show();

  jQuery('.register_button').css('display', 'flex');
  jQuery('.forgot_button').css('display', 'none');
}

function switch_to_forgot_password_form(){
  jQuery('#notActivatedText').hide();
  jQuery('#passwordNotMatchText').hide();

  jQuery('.login').hide();
  jQuery('.register').hide();
  jQuery('.forgot').show();

  jQuery('.register_button').css('display', 'none');
  jQuery('.register_errors').css('display', 'none');
  jQuery('.forgot_button').css('display', 'flex');
}

function switch_to_login_form(){
  jQuery('#notActivatedText').hide();
  jQuery('#passwordNotMatchText').hide();

  jQuery('.register').hide();
  jQuery('.forgot').hide();
  jQuery('.login').show();

  jQuery('.register_button').css('display', 'none');
  jQuery('.register_errors').css('display', 'none');
  jQuery('.forgot_button').css('display', 'none');

  jQuery('#step1').show();
  jQuery('#step2').hide();
}

function valid_register_request(){
  if(jQuery('#first_name').val().length < 3){ return false; }
  if(jQuery('#last_name').val().length < 3){ return false; }

  if(emailExists(jQuery('#log_id').val())){ return false; }
  if(!validEmail(jQuery('#log_id').val())){ return false; }
  if(!validEmail(jQuery('#log_id_bis').val())){ return false; }
  if(jQuery('#log_id').val() != jQuery('#log_id_bis').val()){ return false; }

  if(!jQuery('#pwd').val().match(/[a-z]/g) || !jQuery('#pwd').val().match(/[A-Z]/g) || !jQuery('#pwd').val().match( /[0-9]/g) || !jQuery('#pwd').val().match(/[^a-zA-Z\d]/g) || jQuery('#pwd').val().length < 8){ return false; }
  if(jQuery('#pwd').val() != jQuery('#pwdbis').val()){ return false; }
  if(!jQuery('#agree_terms').is(':checked')){ return false;  }

  return true;
}

function update_register_errors(){
  if(jQuery('#first_name').val().length >= 3){ jQuery('#first_name').css('background', '#FFF'); }
  if(jQuery('#last_name').val().length >= 3){ jQuery('#last_name').css('background', '#FFF'); }

  /*if(emailExists(jQuery('#log_id').val())){
    jQuery('#log_id').css('background', '#FFF');
    jQuery('#error2').hide();
  }*/

  if(validEmail(jQuery('#log_id').val())){
    jQuery('#log_id').css('background', '#FFF');
    jQuery('#error1').hide();
    jQuery('#error2').hide();
  }

  if(validEmail(jQuery('#log_id_bis').val())){
    jQuery('#log_id_bis').css('background', '#FFF');

    if(jQuery('#log_id').val() == jQuery('#log_id_bis').val()){
      jQuery('#log_id').css('background', '#FFF');
      jQuery('#log_id_bis').css('background', '#FFF');
      jQuery('#error3').hide();
    }
  }

  if(jQuery('#pwd').val().match(/[a-z]/g) && jQuery('#pwd').val().match(/[A-Z]/g) && jQuery('#pwd').val().match( /[0-9]/g) && jQuery('#pwd').val().match(/[^a-zA-Z\d]/g) && jQuery('#pwd').val().length >= 8){
    jQuery('#pwd').css('background', '#FFF');
    jQuery('#error4').hide();

    if(jQuery('#pwd').val() == jQuery('#pwdbis').val()){
      jQuery('#pwd').css('background', '#FFF');
      jQuery('#pwdbis').css('background', '#FFF');
      jQuery('#error5').hide();
    }
  }
  if(jQuery('#agree_terms').is(':checked')){ jQuery('#agree_terms_text').css('color', '#000');  }
}

function show_register_errors(){
  var red = '#EDABAB';

  if(jQuery('#first_name').val().length < 3){ jQuery('#first_name').css('background', red); }
  if(jQuery('#last_name').val().length < 3){ jQuery('#last_name').css('background', red); }

  if(emailExists(jQuery('#log_id').val())){
    jQuery('#log_id').css('background', red);
    jQuery('#error2').show();
  }

  if(!validEmail(jQuery('#log_id').val())){
    jQuery('#log_id').css('background', red);
    jQuery('#error1').show();
  }
  if(!validEmail(jQuery('#log_id_bis').val())){ jQuery('#log_id_bis').css('background', red); }

  if(jQuery('#log_id').val() != jQuery('#log_id_bis').val()){
    jQuery('#log_id').css('background', red);
    jQuery('#log_id_bis').css('background', red);
    jQuery('#error3').show();
  }

  if(!jQuery('#pwd').val().match(/[a-z]/g) || !jQuery('#pwd').val().match(/[A-Z]/g) || !jQuery('#pwd').val().match( /[0-9]/g) || !jQuery('#pwd').val().match(/[^a-zA-Z\d]/g) || jQuery('#pwd').val().length < 8){
    jQuery('#pwd').css('background', red);
    jQuery('#error4').show();
  }

  if(jQuery('#pwd').val() != jQuery('#pwdbis').val()){
    jQuery('#pwd').css('background', red);
    jQuery('#pwdbis').css('background', red);
    jQuery('#error5').show();
  }
  if(!jQuery('#agree_terms').is(':checked')){ jQuery('#agree_terms_text').css('color', red);  }
}

function register_user(){
  if(valid_register_request()){
    var first_name = jQuery('#first_name').val();
    var last_name = jQuery('#last_name').val();
    var email = jQuery('#log_id').val();
    var password = jQuery('#pwd').val();

    var parameters = [];
    parameters.push(first_name, last_name, email, password);

    jQuery.ajax({
      url: ajaxurl,
      type: 'POST',
      async: false,
      cache: false,
      dataType: 'JSON',
      data: {action: 'register_user' , parameters: parameters},
      success: function(res) {
        if(res.valid){
          jQuery('#step1').hide();
          jQuery('#step2Firstname').text(first_name);
          jQuery('#step2').show();
        }
        else{
          jQuery('#step1').hide();
          jQuery('register_errors').html(res.message);
          jQuery('register_errors').show();
        }
      }
    });
  }
  else{
    show_register_errors();
  }
}

function send_forgot_password_email(){
  if(validEmail(jQuery('#log_id').val())){
    var parameters = [];
    parameters.push(jQuery('#log_id').val());

    jQuery.ajax({
      url: ajaxurl,
      type: 'POST',
      async: false,
      cache: false,
      dataType: 'JSON',
      data: {action: 'mad_reset_password' , parameters: parameters},
      success: function(res) {
        if(res.valid){
          jQuery('#step1').hide();
          jQuery('#step2forgotpassword').show();
        }
      }
    });
  }
  else{
    jQuery('#log_id').css('background', '#EDABAB');
  }
}

function reset_login_form(){
  switch_to_login_form();
}
