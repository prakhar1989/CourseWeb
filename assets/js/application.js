$(document).ready(function(){
  $(".sorted").tablesorter({sortList: [[ 1, 0 ]]});

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
        // if (totalpoints - computeScore() > -1){
          $('#points').text(totalpoints - computeScore());
        // } else {
        //   $('#points').text('Points Over!'); 
        //   }
    });
    $('#password').popover('show');
});

