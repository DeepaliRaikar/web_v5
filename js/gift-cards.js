/**
 * Created by Deeps on 04-02-2017.
 */
$(document).ready(function () {
    $('#cardMessage').keyup(function () {
        if($('#cardMessage').val() == ""){
            $("#gift-card-message").html("Send a special message to a special someone...");
        }
        else{
            $("#gift-card-message").html($('#cardMessage').val());
        }
    });
    $('#senderName').keyup(function () {
        if($('#senderName').val() == ""){
            $("#gift-card-name").html("Your name here");
        }
        else{
            $("#gift-card-name").html($('#senderName').val());
        }
    });
    $('#addBalance').keyup(function () {
        if($('#addBalance').val() == ""){
            $("#gift-card-amount").html("0");
        }
        else{
            $("#gift-card-amount").html($('#addBalance').val());
        }
    });
});

// #gift-card-type-service

function changeGiftCardType(element){
    var giftCardSelection = "";
    var giftCardType="";

    giftCardSelection = $(element).attr("data-gift-card-selection");
    giftCardType = $(element).attr("data-gift-card-type");

    $("."+giftCardSelection).show();
    $("."+giftCardSelection).siblings(".selection-block").hide();
    $("."+giftCardSelection).siblings().children(".tsz-hidden").hide();
    $("#"+giftCardType).show();
    $("#"+giftCardType).siblings().hide();
}
function loadSupercategories() {
}
function loadCategories() {
    $(".categoriesSection").show();
}

function loadSubcategories() {
    $(".subcategoriesSection").show();
}

function loadVariables() {
    $(".variablesSection").show();

}

function setSelectedService() {
    $("#gift-card-amount").hide();
    $("#gift-card-type-service").show();
    $("#gift-card-type-service").html($("#categories").val()+" "+$("#supercategories").val());
}
function proceedToNextStep(element) {
    $(element).closest(".panel-collapse").removeClass("in");
    $(element).closest(".panel").next().children(".panel-collapse").addClass("in");
}