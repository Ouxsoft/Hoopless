$(window).scroll(function() {
  if ($(document).scrollTop() > 90) {
    $('#logo').addClass('shrink');
  } else {
    $('#logo').removeClass('shrink');
  }
});
