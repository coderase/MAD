function scrollToAnchor(id){
    var aTag = jQuery(id);
    jQuery('html,body').animate({scrollTop: (aTag.offset().top - 30)}, 'slow');
}
