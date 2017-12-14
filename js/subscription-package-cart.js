/**
 * Created by Deeps on 02-02-2017.
 */
var user = "";
user = "old";
var userLogin = "";
userLogin = "";
checkUserLoginStatus();
function checkUser(){


    if(user == "old"){
        $("#btn-login-signup").html("Confirm");
        $(".newUser").slideUp("medium");
        $(".oldUser").slideDown("medium");
        $(".social-login-block").addClass("tsz-hidden");
    }
    else if (user == "new"){
        $("#btn-login-signup").html("Signup");
        $(".newUser").slideDown("medium");
        $(".oldUser").slideDown("medium");
    }
}

function checkUserLoginStatus(){
    if(userLogin == "true"){
        $("#login-step").hide();
        $("#paymentDetails").addClass("in");
    }
}
function addNewAddress(element) {
    $(element).hide();
    $("#add-address-form").slideDown("slow");
}

function cancelAddAddress() {
    $("#add-address-form").slideUp("slow");
    $(".btn-add-new-address").show();
}
function addAddressToCheckout(element) {
    var selectedAddress = $(element).html()
    $("#selected-address").html(selectedAddress).show();
}
function changeSubscriptionPackage() {
    
}
$(document).ready(function(){
    if($(".saved-address").size() > 0){
        $("#add-address-form").hide();
    }

    $(".saved-address").click(function(){
        $(this).addClass("box-active");
        $(this).siblings().removeClass("box-active");
    })
})
