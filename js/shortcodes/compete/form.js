function validEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function valid_compete_form(){
  if(jQuery('#compete_first_name').val().length < 3){ return false; }
  if(jQuery('#compete_last_name').val().length < 3){ return false; }
  if(jQuery('#town').val().length < 3){ return false; }
  if(!validEmail(jQuery('#compete_email').val())){ return false; }
  if(jQuery('#project_desc').val().length < 3){ return false; }

  return true;
}

function show_compete_form_errors(){
  var red = '#EDABAB';

  if(jQuery('#compete_first_name').val().length < 3){ jQuery('#compete_first_name').css('background', red); }else{  jQuery('#compete_first_name').css('background', '#FFF'); }
  if(jQuery('#compete_last_name').val().length < 3){ jQuery('#compete_last_name').css('background', red); }else{  jQuery('#compete_last_name').css('background', '#FFF'); }
  if(jQuery('#town').val().length < 3){ jQuery('#town').css('background', red); }else{  jQuery('#town').css('background', '#FFF'); }
  if(!validEmail(jQuery('#compete_email').val())){ jQuery('#compete_email').css('background', red); }else{  jQuery('#compete_email').css('background', '#FFF'); }
  if(jQuery('#project_desc').val().length < 3){ jQuery('#project_desc').css('background', red); }else{  jQuery('#project_desc').css('background', '#FFF'); }
}

function submit_candidat(){
  if(valid_compete_form()){
    jQuery('#compete_form').submit();
  }
  else{
    show_compete_form_errors();
  }
}
