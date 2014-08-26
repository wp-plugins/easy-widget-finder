jQuery(document).ready(function($){
  //start

  $.expr[":"].contains = $.expr.createPseudo(function(arg) {
      return function( elem ) {
          return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
      };
  });

  $('#txt-ewf-search-widget').keyup(function(event) {
    if( $(this).val().length < 2 ){
      $('#widget-list div.widget').removeClass('ewf-show').removeClass('ewf-hide');
      return;
    };
    $('#widget-list div.widget').removeClass('ewf-show');
    var search_keyword = $(this).val();

    $('#widget-list h4:contains("' + search_keyword + '")').each(function(index, el) {
      $(this).parents('.widget').addClass('ewf-show');
    });
    $('#widget-list div.widget').not('.ewf-show').addClass('ewf-hide');
  });

  //end
});
