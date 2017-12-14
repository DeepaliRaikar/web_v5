<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 02-02-2017
 * Time: 16:44
 */
?>
<div id="logInDetails" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
    <form id="login-details-form">
        <!--mobile number -->
        <div class="form-group customerMobileNumber input-group-text-dropdown">
            <label for="customerMobileNumber" class="control-label">Mobile Number</label>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 input-group-dropdown-button">
                    <select id="countryCode" class="form-control wide">
                        <option value="91">+91</option>
                    </select>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8 input-group-dropdown-text">
                    <input id="customerMobileNumber" required name="customerMobileNumber" maxlength="10" class="form-control" type="number">
                    <span class="help-block">We will notify them through SMS</span>
                </div>
            </div>
        </div>
        <!--mobile number end -->

        <!--fullname -->
        <div class="form-group label-floating newUser tsz-hidden">
            <label class="control-label" for="customerFullName">Your full name</label>
            <input class="form-control" id="customerFullName" type="text">
        </div>
        <!--fullname end-->

        <!--email -->
        <div class="form-group label-floating newUser tsz-hidden">
            <label class="control-label" for="customerEmail">Your email address</label>
            <input class="form-control" id="customerEmail" type="text">
        </div>
        <!--email end-->

        <!--referral code-->
        <div class="form-group label-floating newUser tsz-hidden">
            <label class="control-label" for="referralCode">Apply referral code</label>
            <input class="form-control" id="referralCode" type="text">
        </div>
        <!--referral code end -->

        <!--OTP -->
        <div class="form-group label-floating oldUser tsz-hidden">
            <label class="control-label" for="receivedOTP">Enter OTP here</label>
            <input class="form-control" id="receivedOTP" type="text">
        </div>
        <!--OTP end -->

        <div class="form-group text-right no-margin resendOTP oldUser tsz-hidden">
            <a href="#" class="text-yellow" id="resend-otp">Resend OTP</a>
        </div>

        <button type="button" class="btn btn-raised btn-tsz btn-tszYellow full-width" id="btn-login-signup">Log In</button>

        <div class="container-fluid no-side-padding social-login-block">
            <div class="buttonDivider"><span>or</span></div>

            <button class="btn btn-raised btn-tsz btn-facebook full-width socialLoginBtn"><span class="btnIcon"><i class="fa fa-facebook"></i></span>Login with Facebook</button>
            <button class="btn btn-raised btn-tsz btn-gplus full-width socialLoginBtn"><span class="btnIcon"><i class="fa fa-google-plus"></i></span>Login with Google+</button>
        </div>
    </form>
</div>
