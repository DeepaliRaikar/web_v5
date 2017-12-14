/**
 * Created by Deeps on 03-02-2017.
 */
$(function () {
    var mobileNumber = "";
    var loginStep = 1;
    var randomNumber = 0;
    function checkUser(isRegistered) {
        if(isRegistered) {
            loginStep = 2;
            $("#btn-login-signup").html("Confirm");
            $(".newUser").slideUp("medium");
            $(".oldUser").slideDown("medium");
            $(".social-login-block").addClass("tsz-hidden");
        }else{
            loginStep = 3;
            $("#customerMobileNumber").prop('disabled',true);
            $("#btn-login-signup").html("Signup");
            $(".newUser").slideDown("medium");
            $(".oldUser").slideDown("medium");
        }
    }

//Ajax Call for Resend OTP
    function getDataForResendUserOTP(inputMobileNumber) {
        var response = null;
        dataFactoryCall("services/start/start_resend_method","GET","mobile="+inputMobileNumber,function(returndata){
            response = returndata;
            console.log(response);
            if(response.status){

            }else{
                alert(response.error.code);
            }
        });
        randomNumber++;
    }


    function getDataForUserOTP(inputMobileNumber,otp,caller) {
        var response = null;
        dataFactoryCall("services/start/verifyotp","GET","mobile="+inputMobileNumber+"&otp="+otp+"&random="+randomNumber,function(returndata){
            response = returndata;
            console.log(response);
            if(response.status){
                if(caller=="signup"){

                }else{
                    createCookie("selectedUserID",response.data.userID,90);
                    createCookie("selectedUserName",response.data.userFullName,90);
                    createCookie("selectedUserMinutes",response.data.userMinutes,90);
                    createCookie("selectedUserImage",response.data.userAvatar,90);
                    if(redirectBackPage=="cart"){
                        window.location.href = 'cart.php'; //relative to domain
                    }else{
                        window.location.href = 'dashboard.php'; //relative to domain
                    }
                }
            }else{
                alert(response.error.code);
                $("#receivedOTP").focus();
                $("#receivedOTP").prop('disabled', false);
                $("#btn-login-signup").prop('disabled', false);
            }
            randomNumber++;
        });

    }

    function saveAccessDataIntoSystem() {
        if (typeof(Storage) !== "undefined") {
            if (localStorage.getItem("userID") != null) {
                parseSearchDataAndLoad(localStorage.getItem("tszjsonsearchall"),"localstorage");
            }else{
                //getDataForAllServices();
            }
        }
    }

    function updateDataForLoginProfile(updateFields) {
        var response = null;
        dataFactoryCall("services/user/update", "PUT", updateFields, function (returndata) {
            response = returndata;
            if (response.status) {
                alert(response.data);
            } else {
                alert("Something went wrong! Please try again");
            }
        });
    }

//Ajax Call for Login
    function getDataForUserLogin(inputMobileNumber) {
        var response = null;
        dataFactoryCall("services/start/loginweb","GET","mobile="+inputMobileNumber,function(returndata){
            $("#btn-login-signup").prop('disabled', false);
            response = returndata;
            console.log(response);
            if(response.status){
                parseUserLoginDataAndLoad(response,"ajax");
            }else{
                alert(response.error.code);
                $("#customerMobileNumber").prop('disabled', false);
                $("#btn-login-signup").prop('disabled', false);
            }
        });
    }

    function parseUserLoginDataAndLoad(data,caller) {
        response = data;
        console.log("TRUE");
        if(response.data.isRegistered==true){
            checkUser(response.data.isRegistered);
        }else{
            checkUser(false);

        }
    }

    $("#btn-login-signup").click(function () {
        var inputMobileNumber = $("#customerMobileNumber").val();
        if(loginStep==1){
            var mobileNumberRegex = /^[0]?[789]\d{9}$/;
            if(mobileNumberRegex.test(inputMobileNumber)){
                getDataForUserLogin(inputMobileNumber);
                $("#customerMobileNumber").prop('disabled', true);
                $("#btn-login-signup").prop('disabled', true);
            }else{
                alert('please enter valid mobile number');
                $("#customerMobileNumber").focus();
            }
        }else if(loginStep==2){
            var inputOTP = $("#receivedOTP").val();
            var OTPRegex = /[\d\.]/g;
            if(OTPRegex.test(inputOTP)){
                $("#receivedOTP").prop('disabled', true);
                $("#btn-login-signup").prop('disabled', true);
                getDataForUserOTP(inputMobileNumber,inputOTP);
            }else{
                alert('please enter valid 4 Digit OTP');
                $("#receivedOTP").focus();
            }
        }else if(loginStep==3){
            var userFullName = $("#customerFullName").val();
            var userEmailAddress = $("#customerEmail").val();
            var referralCode = $("#referralCode").val();
            var inputOTP = $("#receivedOTP").val();
            var fullKeyForUpdate = "userID=" + selectedUserID + "&userFullName=" + userFullName + "&userEmailAddress=" + userEmailAddress + "&userMobileNumber=" + userMobileNumber;
        }
    });
});

