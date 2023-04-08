window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}


$('.navbar-toggler').click(function(){
    $('.menu-nav').toggleClass('right');
    $('.menu-nav').toggleClass('indexcity');
});


