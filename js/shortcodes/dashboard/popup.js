function become_artist(user_id){
  var parameters = [];
  parameters.push(user_id);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    async: false,
    cache: false,
    dataType: 'JSON',
    data: {action: 'become_artist' , parameters: parameters},
    success: function(res) {
      if(res.valid){
        document.location.href = document.location.href + '/become-an-artist/';
      }
    }
  });
}
