$(document).ready(function() {
   $('.validate-message').animate({
       opacity: 1
   }, 750);
   $('.correct-responses').animate({
        opacity: 1
    }, 750);
   $('.close').bind("click", function () {
       $(this).parent().animate({
           opacity: 0,
           width: '0px',
           height: '0px',
           fontSize: "0px"
       }, 750, function () {
           $(this).remove();
       })
   })
});