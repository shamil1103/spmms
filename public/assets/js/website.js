/* ==========================================================================
      for notice area marquee text pause
  ========================================================================== */
$(function() {
    $('marquee').mouseover(function() {
        $(this).attr('scrollamount', 0);
    }).mouseout(function() {
        $(this).attr('scrollamount', 5);
    });

});
/* ==========================================================================
       tooltips
  ========================================================================== */
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
/* ==========================================================================
       counter up
  ========================================================================== */
$('.count').each(function() {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 2000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });
});