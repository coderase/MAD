function change_min_end_date(){
  var tmp_date = jQuery('#start_date').val().split('/');
  var start_date = new Date(tmp_date[2], (parseInt(tmp_date[1]) - 1), tmp_date[0])
  var now = new Date();
  var diffTime = Math.abs(start_date - now);
  var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

  jQuery( "#end_date" ).datepicker("option", "minDate", "+"+ (diffDays + 1) +"d");
}

jQuery(function() {
  jQuery.datepicker.setDefaults(jQuery.datepicker.regional["fr"]);
  jQuery("#start_date").datepicker({
    dateFormat: "dd/mm/yy",
    firstDay: 1,
    minDate: 0,
    maxDate: "+6m",
    loseText: 'Fermer',
    prevText: 'Précédent',
    nextText: 'Suivant',
    currentText: 'Aujourd\'hui',
    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
    weekHeader: 'Sem.',
    showOtherMonths:true,
    selectOtherMonths: false,
    regional : 'fr',
  });

  jQuery("#end_date").datepicker({
    dateFormat: "dd/mm/yy",
    firstDay: 1,
    minDate: 0,
    maxDate: "+6m",
    loseText: 'Fermer',
    prevText: 'Précédent',
    nextText: 'Suivant',
    currentText: 'Aujourd\'hui',
    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
    weekHeader: 'Sem.',
    showOtherMonths:true,
    selectOtherMonths: false,
    regional : 'fr',
  });
});

function show_metas_project_popup(id){
  jQuery(id).css('display', 'flex');
}

function hide_metas_project_popup(id){
  jQuery(id).hide();
}

function add_perk(){
  jQuery('#admin_add_perk').hide();

  var project_id = jQuery('#project_id').val();
  var product_id =  jQuery('#product_id').val();
  var delivery =  jQuery('#perk_delivery').val();

  var parameters = [];
  parameters.push(project_id, product_id, delivery);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    dataType: 'JSON',
    async: false,
    cache: false,
    data: { action: 'add_perk', parameters: parameters},
    success: function(res) {
      jQuery('#metas_project_perks_popup').hide();
    }
  });
}

function delete_a_perk(elem){
  var project_id = jQuery(elem).attr('data-project');
  var product_id = jQuery(elem).attr('data-product');

  var parameters = [];
  parameters.push(project_id, product_id);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    dataType: 'JSON',
    async: false,
    cache: false,
    data: { action: 'delete_perk', parameters: parameters},
    success: function(res) {
      jQuery(elem).parent().parent().hide();
    }
  });
}
