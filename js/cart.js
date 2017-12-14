/**
 * Created by Deeps on 02-02-2017.
 */
var cartAddressIndex = 0;
var cartAddressObject;
var cartItemObject = null;
var cartItemObjectName = "cartItems";
var modifiedCartItemName = "cartItemsModified";
var emptyCart = "";

$(document).ready(function () {
    if (selectedUserID > 0) {
        getDataForDashboardAddress();
        openAddressModuleAccordin();

    }
    if ($(".saved-address").size() > 0) {
        $("#add-address-form").hide();
        var firstAddress = "";
        // select first address for cart checkout
        firstAddress = $("#saved-address .saved-address").first();
        addAddressToCheckout(firstAddress);
        $(firstAddress).addClass("box-active");
        $(firstAddress).siblings().removeClass("box-active");
    }
    $(".saved-address").click(function () {
        $(this).addClass("box-active");
        $(this).siblings().removeClass("box-active");
    });


    if (typeof(Storage) !== "undefined") {
        console.log("Cart Functions Here");
        var cartItemFromStorage = [];
        if(localStorage.getItem(modifiedCartItemName) != null){
            cartItemFromStorage = JSON.parse(localStorage.getItem(modifiedCartItemName));
            if (cartItemFromStorage.length > 0) {
                cartItemObject = cartItemFromStorage;
                parseCartDataToShow(cartItemFromStorage);
            }
        }else if (localStorage.getItem(cartItemObjectName) != null) {
            cartItemFromStorage = JSON.parse(localStorage.getItem(cartItemObjectName));
            if (cartItemFromStorage.length > 0) {
                cartItemObject = cartItemFromStorage;
                parseCartDataToShow(cartItemFromStorage);
            } else {
                // window.location = '/';
            }
        } else {
            // window.location = '/';
        }
    } else {
        console.log("No Local Storage available.");
        var cartItem = JSON.parse(getCookie(cartItems));
        if (cartItem.length > 0) {
            cartItemObject = cartItem;
            parseCartDataToShow(cartItem);
        } else {
            // window.location = '/';
        }
    }



    //remove item from cart
    $(".remove-item").click(function(){
        var indexOfCartItem = $(this).attr("data-index");
        alert(indexOfCartItem);

       /*$(this).closest(".list-group-item").siblings(".list-group-separator").remove();
       $(this).closest(".list-group-item").slideUp(500, function() {
           $(this).remove();
       });*/
        // removes the list item separator
        $(this).closest(".list-group-item").next(".list-group-separator").remove();
        // removes the added service details from the cart
       $(this).closest(".list-group-item").slideUp(500, function() {
           $(this).remove();
       });
       if($("#cartListItemsFinal").children(".list-group-item").length < 2){
           emptyCart += '<div class="ontainer-fluid text-center">'
           + '<div><img src="img/empty-cart.png" id="empty-cart"/></div><br/>'
           + '<div><span class="font-weight-bold font-17 text-upper">Your cart is empty</span></div>'
           + '<div><button class="btn btn-raised btn-tsz btn-tszYellow">Add services now</button></div>'
           + '</div>';
            $(".cartListItemsFinal").html(emptyCart);
       }
    })
});



function addNewAddress(element) {
    $(element).hide();
    $("#add-address-form").slideDown("slow");
}

function cancelAddAddress() {
    $("#add-address-form").slideUp("slow");
    $(".btn-add-new-address").show();
}

function openAddressModuleAccordin() {
    $("#addressDetailsModule").toggleClass("in");
    $("#addressDetailsModule").css("height", "");
}

function addAddressToCheckout(element) {
    var addressIndex = $(element).attr('data-index');
    cartAddressIndex = addressIndex;
    var selectedAddress = $(element).html();
    $("#selected-address").html(selectedAddress).show();
    $(element).closest(".collapse").toggleClass("in");
    $("#paymentDetailsModule").toggleClass("in");
    $("#paymentDetailsModule").css("height", "");
}

function getDataForDashboardAddress() {
    var response = null;
    dataFactoryCall("services/addresses/fetch", "GET", "userID=" + selectedUserID + "&cityID=" + selectedCityID, function (returndata) {
        response = returndata;
        if (response.status) {
            parseDashboardAddressDataAndLoad(response, "ajax");
        } else {
            $("#no-addresses").show();
        }
    });
}

function parseDashboardAddressDataAndLoad(response, type) {
    if (response.data.length > 0) {
        cartAddressIndex = 0;
        cartAddressObject = response.data;
        var htmldataforaddresses = '';
        var firstdataforaddress = '';
        $.each(response.data, function (index, value) {
            if(index==0){
                firstdataforaddress+='<h5>' + value.areaName + ' (' + value.areaPinCode + ')</h5>'
                    + '<div class="address">' + value.userAddress + '</div>'
                    + '<br/>'
                    + '<div class="userMobileNumber">' + value.cityName + '</div>';
            }
            htmldataforaddresses += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation saved-address" data-index="' + index + '" id="addresscard-' + index + '" onclick="javascript: addAddressToCheckout(this);">'
                + '<h5>' + value.areaName + ' (' + value.areaPinCode + ')</h5>'
                + '<div class="address">' + value.userAddress + '</div>'
                + '<br/>'
                + '<div class="userMobileNumber">' + value.cityName + '</div>'
                + '</div>';
        });
        $("#selected-address").html(firstdataforaddress).show();
        $("#saved-address").html(htmldataforaddresses);
    }
    $(".saved-address").click(function () {
        var addressIndex = $(this).attr('data-index');
        cartAddressIndex = addressIndex;
    });
}

function parseCartDataToShow(cartItemFromStorage) {
    var cartItemHTMLBlock = '';
    var totalAmountSum = 0;
    var actualAmountSum = 0;
    var serviceTaxAmount = 0;
    $.each(cartItemFromStorage, function (index, value) {
        var hiddenClass ="";
        var serviceTaxApplicable = false;
        if(serviceTaxApplicable){
            serviceTaxAmount = Math.round(value.totalCost*15/100);
        }else{
            hiddenClass ="tsz-hidden";
        }
        cartItemHTMLBlock += '<div class="list-group-item">'
            + '<div class="row-picture">'
            + '<img src="//cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/' + value.categoryIcon + '.png" alt="icon" />'
            + '</div>'
            + '<div class="row-content">'
            + '<h5 class="font-15 service-booked"><b>' + value.serviceName + ' - ' + value.supercategoryName + '</b></h5>'
            + '<p class="list-group-item-text bookedServiceSchedule font-14">' + value.humanizedDateWithTime + '</p>'
            + '<div class="container-fluid no-side-padding serviceTotalDetails text-right">'
            + '<div class="row">'
            + '<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6 text-right">Service Price</div>'
            + '<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6 text-right service-price">&#8377; ' + (value.totalCost-serviceTaxAmount) + '</div>'
            + '</div>'
            + '<div class="row '+hiddenClass+'">'
            + '<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6 text-right">Service Tax(+)'
            + '</div>'
            + '<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6 text-right service-tax-applied">&#8377; '+serviceTaxAmount+'</div>'
            + '</div>'
            + '<div class="row '+hiddenClass+'">'
            + '<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6 text-right">Sub Total</div>'
            + '<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6 text-right subtotal">&#8377;'
            + '<b>' + value.totalCost + '</b></div>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<span data-index="'+index+'" class="remove-item"><i class="material-icons">clear</i></span>'
            + '</div>'
            + '<div class="list-group-separator"></div>';
        actualAmountSum = parseInt(value.actualCost) + actualAmountSum;
        totalAmountSum = parseInt(value.totalCost) + totalAmountSum;
    });
    $("#cartListItemsFinal").html(cartItemHTMLBlock);
    var discountSum = actualAmountSum - totalAmountSum;
    $("#totalCartActualAmount").html(actualAmountSum);
    $("#totalCartDiscountAmount").html(discountSum);
    $("#grand-total").html(totalAmountSum);

}

function getDataForCouponApply(couponName,useMinutes,userID,cityID,cartItems) {
    var response = null;
    dataFactoryCall("services/coupons/apply", "POST", "couponName=" + couponName + "&useMinutes=" + useMinutes + "&userID=" + userID + "&cityID=" + cityID + "&cartItems=" + cartItems + "&platform=web", function (returndata) {
        response = returndata;
        if (response.status) {
            parseCouponApplyDataAndLoad(response, "ajax");
        } else {

        }
    });
}

function parseCouponApplyDataAndLoad(response, type) {
    if (response.data.length > 0) {
        console.log(response);
        
    }
}

$("#tszcouponapply").click(function () {
    var getCouponCodeFromBox = $("#couponCode").val();
    getCouponCodeFromBox = getCouponCodeFromBox.toUpperCase();
    var stringOfJSONData = JSON.stringify(cartItemObject);

    if(getCouponCodeFromBox.length>1){
        var userMinutes = readCookie('selectedUserMinutes');
        getDataForCouponApply(getCouponCodeFromBox,userMinutes,selectedUserID,selectedCityID,stringOfJSONData);
    }else{
        showSnackbar("Coupon Code Is Invalid");
        $("#couponCode").val("");
        $("#couponCode").focus();
    }
});


