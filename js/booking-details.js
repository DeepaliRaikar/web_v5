/**
 * Created by Deeps on 02-02-2017.
 */
$(document).ready(function(){
    var bookingPageCategoryID=1;
    if (typeof(Storage) !== "undefined") {
        var cartItemFromStorage = [];
        if (localStorage.getItem("cartItems") != null) {
            cartItemFromStorage = JSON.parse(localStorage.getItem("cartItems"));
            if(cartItemFromStorage.length>0){
                parseCartDataToShow(cartItemFromStorage);
            }else{
               window.location = '/';
            }
        }else{
            window.location = '/';
        }
    } else {
        console.log("No Local Storage available.");
        var cartItem = JSON.parse(getCookie(cartItems));
        if(cartItem.length>0){
            parseCartDataToShow(cartItem);
        }else{
            window.location = '/';
        }
    }

    function parseCartDataToShow(cartItemFromStorage) {
       var htmlForServiceImage ='<img class="transparent-background" src="//cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/'+cartItemFromStorage[0].categoryIcon+'.png" alt="icon">';
        $("#bookingImageIcon").html(htmlForServiceImage);
        var htmlForServiceDate = cartItemFromStorage[0].humanizedDateWithTime;
        $(".bookedServiceSchedule").html(htmlForServiceDate);
        var htmlForServiceName = cartItemFromStorage[0].subcategoryName+' - '+cartItemFromStorage[0].serviceName;
        $(".service-booked").html(htmlForServiceName);
        var totalPrice = 0;
        $.each(cartItemFromStorage, function (index, value) {

            totalPrice = totalPrice + value.totalCost;
        });
        $(".cartTotal").html(totalPrice);
        $(".cartItemsCount").html(cartItemFromStorage.length);
    }

    function getDataForRecommendations () {
        var response = null;
        dataFactoryCall("services/related/recommendationsweb","GET","categoryID="+bookingPageCategoryID+"&cityID="+selectedCityID+"&platformName=web",function(returndata){
            response = returndata;
            if(response.status){
                parseRecommendationsDataAndLoad(response,"ajax");
            }else{

            }
        });
    }
    function parseRecommendationsDataAndLoad(data,caller) {
        var response = data;
        console.log(response);
        var htmldataforrecommendations = "";
        $.each(response.data.dates, function (index, value) {
            htmldataforrecommendations='<a href="#">'
                '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">'
                '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">'
                '<img src="img/placeholder.gif" width="100%" />'
                '</div>'
                '</div>'
                '</a>';

        });
        //$("#serviceTime").html(htmldataforrecommendations);
        $('select').niceSelect('update');
    }
    //getDataForRecommendations();


})