

/*
$("#menu").hover(function() {
    $(".cbc-button").show();
    $(".cbc-name").hide();
}).mouseleave(function() {
    $(".cbc-name").show();
    $(".cbc-button").hide();
});
*/


/*/!*show-cart*!/
$('#menu').on( "mouseenter", function () {
    $('.showcart').addClass('showcartactive')
});

$('.show-cardbody-cancel').on( "click", function () {
    $('.showcart').removeClass('showcartactive')
});*/

window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}
