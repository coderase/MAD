function add_judge(){
  jQuery('#admin_add_perk').hide();

  var compete_id = jQuery('#compete_id').val();
  var artist_id =  jQuery('#artist_id').val();

  var parameters = [];
  parameters.push(compete_id, artist_id);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    dataType: 'JSON',
    async: false,
    cache: false,
    data: { action: 'add_judge', parameters: parameters},
    success: function(res) {
      jQuery('#metas_compete_judges_popup').hide();
    }
  });
}

function delete_a_judge(elem){
  var compete_id = jQuery(elem).attr('data-compete');
  var artist_id = jQuery(elem).attr('data-judge');

  var parameters = [];
  parameters.push(compete_id, artist_id);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    dataType: 'JSON',
    async: false,
    cache: false,
    data: { action: 'delete_judge', parameters: parameters},
    success: function(res) {
      jQuery(elem).parent().parent().hide();
    }
  });
}
