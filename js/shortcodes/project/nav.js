function show_project_content(elem){
  jQuery('#project_content_section').show();
  jQuery('#project_comment_section').hide();

  jQuery('.project_nav_elem').removeClass('active');
  jQuery(elem).parent().addClass('active');
}

function show_project_comment(elem){
  jQuery('#project_comment_section').show();
  jQuery('#project_content_section').hide();

  jQuery('.project_nav_elem').removeClass('active');
  jQuery(elem).parent().addClass('active');
}
