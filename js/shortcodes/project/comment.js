jQuery( document ).ready(function() {
  jQuery("#project_comment_form").on('submit', function(event){
    if(jQuery('#project_comment_text').val().length < 10){
      event.preventDefault();
      jQuery('#project_comment_text').css('background', '#EDABAB');
    }
  });
});
