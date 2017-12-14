/**
 * Created by Deeps on 07-03-2017.
 */
var header = $("#header");
$(document).ready(function(){
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            header.addClass("darkHeader");
        }
        else{
            header.removeClass("darkHeader");
        }
    });


});

function loadCategories() {
    
}

function loadSubcategories() {
    
}

function generateCaptureLead() {

    $(".leadDetails").fadeOut();
    $(".otherDetails").fadeIn();
}

function loadVariables() {
    
}

function priceChange() {
    
}

function updateLead() {
    
}