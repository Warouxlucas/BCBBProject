

$(function() {
    var header = $(".header");
    var shrink = $(".shrink");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 180) {
            header.removeClass('header').addClass("shrink");
        } else {
            header.removeClass("shrink").addClass('header');
        }
    });


});