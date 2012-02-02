$(document).ready(function(){
  
    // LOGIN PAGE
    //error message display in login page
    $('.msgerror').hide();
    $('.fadein').fadeIn();
    
    //ROUND1
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
    $('#Round1Submit').click(function(e){
       var totalCredits = parseFloat($('#credit span').text());
       if(totalCredits>21 || totalCredits<15){
         alert('Please make sure your total credits are between 15 and 21');
         return false;
       } else {
          e.preventDefault();
          $('#modal-from-dom').modal('show');
       }
    });

    //ROUND2 
    //scroll settings for round2
    $('.nav li a').smoothScroll();
    $('a.brand').smoothScroll({offset: -100});
    $('.well a').smoothScroll({offset: -100});
    $('.pagination a').smoothScroll()

    //selection tables in round2
    $('table tr input[type="radio"]').click(function(e) {
        var trClicked = $(this).parent().parent();
        console.log(trClicked);
        if (!$(trClicked).hasClass('selected')){
          console.log("here");
          //remove selected class from all rows in this table
          $(trClicked).parent().children().removeClass('selected');
          //add selected class to this row
          $(trClicked).addClass('selected');
        }
       e.stopPropagation();
       // computeRound2Credits();
    });

    $('table.round2Tables tr').click(function(){
      if (!$(this).hasClass('selected')){
        //remove selected class from all rows in this table
        $(this).parent().children().removeClass('selected');
        //add selected class to this row
        $(this).addClass('selected');
      } else {
        $(this).removeClass('selected');
      }
      var radio = $(this).find('input[type=radio]');
      radio.prop('checked', !radio.is(':checked'));
      // computeRound2Credits();
   });
    
   //function to compute round2 credits
   function computeRound2Credits(){
      var totalcredits = 0;
      $('.round2Tables input[type=radio]').each(function(){
        if ($(this).prop('checked')){ 
          clickedCredits = parseFloat($(this).parent().prev().text());
          totalcredits += clickedCredits;
        }
       });
       return totalcredits;
    }
    
    //call this function on submit click
    $('#round2submit').click(function(e){
       var totalCredits = computeRound2Credits();
       if(totalCredits<5 || totalCredits>7){
         alert('Please make sure your total credits are between 5 and 7');
         return false;
       } else {
          e.preventDefault();
          $('#modal-from-dom').modal('show');
       }
    });

    $('#modal-from-dom').modal({
      keyboard: true,
      backdrop: true 
    });

    //ROUND3
    //points display on round3
    var totalpoints = 700;
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
    
    $('#round3submit').click(function(e){
       var checkpoints = parseInt($('#points').text()); 
       if(isNaN(checkpoints) || checkpoints<0){
         alert("Please make sure you use at the most 700 points for bidding");
         return false;
       } else {
          e.preventDefault();
          $('#modal-from-dom').modal('show');
       }
    });
    
    //COMMON TO ROUNDS
    //modal window handling
    $('.quit').click(function(){
      $('#modal-from-dom').modal('hide');
    });

    $('.modal-footer a.primary').click(function(){
      $('#round1Form').submit();
      $('#round2Form').submit();
      $('#round3Form').submit();
    });
});


