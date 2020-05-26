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

function show_metas_project_popup(){
  jQuery('#metas_project_popup').css('display', 'flex');
}

function hide_metas_project_popup(){
  jQuery('#metas_project_popup').hide();
}

function show_step1(){
  jQuery('.step2choice').hide();
  jQuery('#step1').show();
  jQuery('#step2').hide();
}

function show_step2(id){
  jQuery('.step2choice').hide();
  jQuery('#step2choice'+id).show();
  jQuery('#step1').hide();
  jQuery('#step2').show();
}

function add_contribution(){
  var title = jQuery('#contribution_title').val();
  var price =  jQuery('#contribution_price').val();
  var delivery =  jQuery('#contribution_delivery').val();
  var description =  jQuery('#contribution_desc').val();

  var parameters = [];
  parameters.push(title, price, delivery, description);

  jQuery.ajax({
    url: ajaxurl,
    type: 'POST',
    dataType: 'JSON',
    data: { action: 'add_contribution', parameters: parameters},
    success: function(res) {
      alert('added');
    }
  });
}
