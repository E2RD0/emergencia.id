function checkValue(element) {
    if ($(element).val()){
        $(element).addClass('out');
        $(element).removeClass('in');
    }else{
        $(element).removeClass('in');
        $(element).addClass('out');
        }
}

$(document).ready(function() {
  // Run on page load
  $('input-group').each(function() {
    checkValue(this);
  })
  // Run on input exit
  $('input-group').blur(function() {
    checkValue(this);
  });

});
