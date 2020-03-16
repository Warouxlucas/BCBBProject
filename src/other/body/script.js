

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

function myFunction() {
  document.getElementById("textarea").style.display = "flex";
  document.getElementById("l-comment").style.display = "none";
};

function myFunction1() {
  document.getElementById("textarea1").style.display = "flex";
  document.getElementById("l-comment1").style.display = "none";
};


function myFunction2() {
  document.getElementById("textarea2").style.display = "flex";
    document.getElementById("l-comment2").style.display = "none";
};


