$(document).ready(function(){
    //scroll settings for round2
    $('.nav li a').smoothScroll();
    $('a.brand').smoothScroll({offset: -100});
    $('.well a').smoothScroll({offset: -100});
    $('.pagination a').smoothScroll()

    //error message display in login page
    $('.msgerror').hide();
    $('.fadein').fadeIn();
    
    //points display on round3
    var totalpoints = 2000;
    $('#points').text(totalpoints);
    function computeScore(){
      var score = 0;
      $('input[type=text]').each(function(){
          if($(this).val()){
            score += parseInt($(this).val());
          }
      });
      return score;
    }
    $('input[type=text]').change(function(){
          $('#points').text(totalpoints - computeScore());
    });
    
    //credits display on round1
    function computeTotalCredits(){
      var totalcredits = 0;
      $('#Round1Table input[type=checkbox]').each(function(){
        if ($(this).prop('checked')){ 
          clickedCredits = parseFloat($(this).parent().prev().text());
          totalcredits += clickedCredits;
        }
        var displaySpan = $('#credit span');
          displaySpan.text(totalcredits);
          if(totalcredits>14 && totalcredits <22){
            console.log("here");
            if(displaySpan.parent().hasClass('important')){
              displaySpan.parent().removeClass('important').addClass('success');
            }
          } else {
            if (displaySpan.parent().hasClass('success')){
              displaySpan.parent().removeClass('success').addClass('important');
            }
          }
      });
    }

    $('#Round1Table input[type=checkbox]').change(function(){
      computeTotalCredits();
    });
    
    //selection tables in round1
    $('#eoiTable tr input[type="checkbox"]').click(function(e) {
       $(this).parent().parent().toggleClass('selected');
       e.stopPropagation();
    });
    $('#eoiTable tr').click(function(){
      $(this).toggleClass('selected');
      var $checkbox = $(this).find('input[type=checkbox]');
      $checkbox.prop('checked', !$checkbox.is(':checked'));
      computeTotalCredits();
     });

     //onSubmit check in round1
     $('#round1Form').submit(function(){
       var totalCredits = parseFloat($('#credit span').text());
       if(totalCredits>21 || totalCredits<15){
         alert('Please make sure your total credits are between 15 and 21');
         $('#modal-from-dom').modal('hide');
         return false;
       } else {
         return true;
       }
     });
    
    //modal window handling
    $('.quit').click(function(){
      $('#modal-from-dom').modal('hide');
    });

    $('.modal-footer a.primary').click(function(){
      $('#round1Form').submit();
    });
});


