/**
 * Created by anuragshukla on 10/02/17.
 */

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";

    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
$(function() {
    if (typeof(Storage) !== "undefined") {
        var cartItemFromStorage = [];
        if (localStorage.getItem("cartItems") != null) {
            cartItemFromStorage = JSON.parse(localStorage.getItem("cartItems"));
            if(cartItemFromStorage.length>0){
                $("#cart-item-count").html(cartItemFromStorage.length);
                $("#cart-items").addClass("has-cart-items");
            }else{
                $("#cart-item-count").html(0);
                $("#cart-items").removeClass("has-cart-items");
            }
        }
    }
    if($("footer").position().top < 0){
        $("footer").addClass("navbar-fixed-bottom")
    }
    $('.navbar-toggle').click(function(){
        $(this).toggleClass('open');
    });
});

// toggle sidebar for servicepage and others
function toggleSidebar(){
    $("#side-menu").toggleClass('side-menu-hidden side-menu-visible');
    if(checkSideNavigationVisibility("#side-menu", "side-menu-visible")){
        $("header").append("<div class='sidebar-overlay' onclick='toggleSidebar()'></div>");
        $("body").addClass("sidebar-overlay");
    }
    else{
        $("body").removeClass("sidebar-overlay");
        $(".sidebar-overlay").remove();
    }
}

// check if sidebar is visible or not
function checkSideNavigationVisibility(sidebar, checkForClass){
    if($(sidebar).hasClass(checkForClass)){
        return true;
    }
    else{
        return false;
    }
}
$('#back-to-top').on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({
        scrollTop: 0
    }, 700);
});

// if ($('#back-to-top').length) {
//     var scrollTrigger = 100, // px
//         backToTop = function () {
//             var scrollTop = $(window).scrollTop();
//             if (scrollTop > scrollTrigger) {
//                 $('#back-to-top').addClass('show');
//             } else {
//                 $('#back-to-top').removeClass('show');
//             }
//         };
//     backToTop();
//     $(window).on('scroll', function () {
//         backToTop();
//     });
//     $('#back-to-top').on('click', function (e) {
//         e.preventDefault();
//         $('html,body').animate({
//             scrollTop: 0
//         }, 700);
//     });
// }
