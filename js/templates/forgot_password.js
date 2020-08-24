function valid_reset_password_request(){
  if(!jQuery('#newpwd').val().match(/[a-z]/g) || !jQuery('#newpwd').val().match(/[A-Z]/g) || !jQuery('#newpwd').val().match( /[0-9]/g) || !jQuery('#newpwd').val().match(/[^a-zA-Z\d]/g) || jQuery('#newpwd').val().length < 8){ return false; }
  if(jQuery('#newpwd').val() != jQuery('#newpwdbis').val()){ return false; }

  return true;
}

function update_set_password_error(){
  if(jQuery('#newpwd').val().match(/[a-z]/g) && jQuery('#newpwd').val().match(/[A-Z]/g) && jQuery('#newpwd').val().match( /[0-9]/g) && jQuery('#newpwd').val().match(/[^a-zA-Z\d]/g) && jQuery('#newpwd').val().length >= 8){
    jQuery('#newpwd').css('background', '#FFF');
    jQuery('#errorpdw1').hide();

    if(jQuery('#newpwd').val() == jQuery('#newpwdbis').val()){
      jQuery('#newpwd').css('background', '#FFF');
      jQuery('#newpwdbis').css('background', '#FFF');
      jQuery('#errorpdw2').hide();
    }
  }
}

function show_reset_password_error(){
  var red = '#EDABAB';

  if(!jQuery('#newpwd').val().match(/[a-z]/g) || !jQuery('#newpwd').val().match(/[A-Z]/g) || !jQuery('#newpwd').val().match( /[0-9]/g) || !jQuery('#newpwd').val().match(/[^a-zA-Z\d]/g) || jQuery('#newpwd').val().length < 8){
    jQuery('#newpwd').css('background', red);
    jQuery('#errorpdw1').show();
  }

  if(jQuery('#newpwd').val() != jQuery('#newpwdbis').val()){
    jQuery('#newpwd').css('background', red);
    jQuery('#newpwdbis').css('background', red);
    jQuery('#errorpdw2').show();
  }
}

jQuery( document ).ready(function() {
  jQuery('#reset_password_form').on('submit', function(event){
    if(!valid_reset_password_request()){
      event.preventDefault();
      show_reset_password_error();
    }
  });
});
