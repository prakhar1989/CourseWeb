$(document).ready(function(){
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
    
    //error message display in login page
    $('.msgerror').hide();
    $('.fadein').fadeIn();

    //selection tables in round1
    
    $('#eoiTable tr input[type="checkbox"]').click(function(e) {
       $(this).parent().parent().toggleClass('selected');
       e.stopPropagation();
    });
    $('#eoiTable tr').click(function(){
      $(this).toggleClass('selected');
      var $checkbox = $(this).find('input[type=checkbox]');
      $checkbox.prop('checked', !$checkbox.is(':checked'));
     });
});


