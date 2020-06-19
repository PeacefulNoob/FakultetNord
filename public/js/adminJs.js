
  $( document ).ready(function() {
    $('#dodajVideo').css({
        'display': 'none'
    });
    $('#dodajSliku').css({
        'display': 'none'
    });
    $('#dodajThumb').css({
      'display': 'none'
  });
    $('#photoButton').click(function() {
        $('#dodajSliku').css({
            'display': 'block'
        });
        
        $('#dodajVideo').css({
          'display': 'none'
      });
      $('#dodajThumb').css({
        'display': 'block'
    });
      });
      $('#videoButton').click(function() {
        $('#dodajSliku').css({
            'display': 'none'
        });
        $('#dodajThumb').css({
          'display': 'none'
      });
        $('#dodajVideo').css({
          'display': 'block'
      });
      });
});

//preloader
//preloader
$(document).ready(function() {
 
  setTimeout(function(){
      $('body').addClass('loaded');
  }, 400);

});

$(document).ready(function(){
    $("form").on("submit", function(){
      $("#loader-wrapper").fadeIn();
    });//submit
  });//document ready