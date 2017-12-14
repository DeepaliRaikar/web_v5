/**
 * Created by Deeps on 25-01-2017.
 */

var header = $("#header");
$(document).ready(function(){
    $("#indexPageUserName").html("Hi, "+selectedUserName);
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            header.addClass("darkHeader");
            // var searchbar = $("#tszBanner .searchServices").offset();
            // var actualBottom = $("nav").offset().top + $("nav").outerHeight(true);
            // if(Math.round(searchbar.top) == Math.round((actualBottom-45)) || Math.round(searchbar.top) < Math.round((actualBottom-45))){
            //     $("#tszBanner .tszSearch").addClass("fixedSearchBar");
            // }
            // else {
            //     $("#tszBanner .tszSearch").removeClass("fixedSearchBar");
            //
            // }
        }
        else{
            header.removeClass("darkHeader");
        }
        if($(window).scrollTop() >= $("#tszDepend").offset().top){
            $("#header").css({
                'margin-top': '-'+$("#topmenu").height()+'px'
            });
            $("#tszBanner .tszSearch").css({
                'margin-top': '-'+$("#topmenu").height()+'px'
            });
        }
        else if($(window).scrollTop() <= $("#tszBanner").offset().top + 200){
            $("#header").css({
                'margin-top': 0
            });
            $("#tszBanner .tszSearch").css({
                'margin-top': 0
            });
        }

    });
});
$(document).ready(function(){
    //Function to Call Data Factory
    function getDataForAreasMarquee() {
        var response = null;
        dataFactoryCall("services/addresses/areas","GET","cityID="+selectedCityID+"&getDesc=true",function(returndata){
            response = returndata;
            if(response.status){
                localStorage.setItem("tszjsonareas",JSON.stringify(response));
                parseAreaDataAndLoad(response,"ajax");
            }
        });
    }
    //Function to Parse the data from factory of local storage
    function parseAreaDataAndLoad(data,caller) {
        response = data;
        var ifDeletedLocalData = false;
        var milliseconds = Math.round((new Date).getTime()/1000);
        if(caller=="localstorage"){
            response = JSON.parse(data);
            //Delete stale localstorage data as we have the timestamp
            if(milliseconds-(response.timestamp)>removeLocalStorageDataTime){
                localStorage.removeItem("tszjsonareas");
                ifDeletedLocalData = true;
            }
        }
        if(ifDeletedLocalData){
            getDataForAreasMarquee();
        }else{
            var htmldataforarea = "";
            $.each(response.data.areas, function( index, value ) {
                htmldataforarea +='<li>'+value.areaName+' - '+ value.areaPinCode +'</li>';

            });
            $("#tszCityDescription").html(response.data.desc.cityDescription);
            $(".cityNameForArea").html(response.data.desc.cityName);

            $(".areas-scroller").html(htmldataforarea);
        }
    }

    if (typeof(Storage) !== "undefined") {
        if (localStorage.getItem("tszjsonareas") != null) {
            parseAreaDataAndLoad(localStorage.getItem("tszjsonareas"),"localstorage");
            //Load from Localstorage
        }else{
            getDataForAreasMarquee(); //Call the Factory again
        }
    } else {
        console.log("No Local Storage available.");
        getDataForAreasMarquee(); //Call the factory to load data - Fallback
    }
});

$(document).ready(function(){

    //Function to Call Data Factory
    function getDataForTestimonials() {
        var response = null;
        dataFactoryCall("services/feedbacks/testimonials","GET","cityID="+selectedCityID,function(returndata){
            response = returndata;
            if(response.status){
                localStorage.setItem("tszjsontestimonials",JSON.stringify(response));
                parseTestimonialDataAndLoad(response,"ajax");
            }
        });
    }
    //Function to Parse the data from factory of local storage
    function parseTestimonialDataAndLoad(data,caller) {
        response = data;
        var ifDeletedLocalData = false;
        var milliseconds = Math.round((new Date).getTime()/1000);
        if(caller=="localstorage"){
            response = JSON.parse(data);
            //Delete stale localstorage data as we have the timestamp
            if(milliseconds-(response.timestamp)>removeLocalStorageDataTime){
                localStorage.removeItem("tszjsontestimonials");
                ifDeletedLocalData = true;
            }
        }
        if(ifDeletedLocalData){
            getDataForTestimonials();
        }else{
            var htmldatafortestimonials = "";
            $.each(response.data, function( index, value ) {
                htmldatafortestimonials +='<div class="text-center col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">'+
                    '<div>'+
                    '<p class="left-quote">'+
                    '<img src="img/left-quote.png"/>'+
                    '</p>'+
                    '<p class="testimonial">'+value.testimonial+'</p>'+
                    '<p class="testimonee"><h3>'+value.name+'</h3></p>'+
                    '<p class="testimonialService">'+value.service+'</p>'+
                    '</div>'+
                    '</div>';

            });
            $(".home-testimonial-slider").html(htmldatafortestimonials);
            /** Explicit code for Carousel, it must be initialized post data is loaded**/
            //        initialize owl carousel
            $('.owl-carousel').owlCarousel({
                autoplay: true,
                items: 1,
                navigation:true,
                nav: true,
                // loop: true,
                navText: [
                    '<i class="fa fa-angle-left" style="font-size: 4rem;"></i>',
                    '<i class="fa fa-angle-right" style="font-size: 4rem;"></i>'
                ]
            });
            $( ".owl-prev").addClass("pull-left");
            $( ".owl-next").addClass("pull-right");
        }
    }

    if (typeof(Storage) !== "undefined") {
        if (localStorage.getItem("tszjsontestimonials") != null) {
            parseTestimonialDataAndLoad(localStorage.getItem("tszjsontestimonials"),"localstorage");
            //Load from Localstorage
        }else{
            getDataForTestimonials(); //Call the Factory again
        }
    } else {
        console.log("No Local Storage available.");
        getDataForTestimonials(); //Call the factory to load data - Fallback
    }

});

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#content-anchor').offset().top;

    if (window_top >= div_top-15) {
        $('#tszBanner .tszSearch').addClass('stick');
    } else {
        $('#tszBanner .tszSearch').removeClass('stick');
    }
}

$(function () {
    $('#tszBanner .owl-carousel').owlCarousel({
        items: 1
    });
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});

