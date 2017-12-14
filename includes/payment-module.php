<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 02-02-2017
 * Time: 16:49
 */
?>
<div id="paymentDetails" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
    <form id="payment-form">
        <!--full address-->
        <label class="text-blue" for="couponCode"><small>Coupon Code</small></label>
        <div class="form-group label-static">
            <div class="input-group">
                <input id="couponCode" class="form-control" placeholder="Enter Coupon Code" type="text" maxlength="10">
                <span class="input-group-btn">
                    <button class="btn btn-tsz btn-raised btn-tszYellow" id="tszcouponapply" type="button">Apply</button>
                </span>
            </div>
        </div>
        <!--full address end-->

        <label class="text-blue"><small>Select a Payment Method</small></label>
        <hr/>
        <div class="form-group">

            <div class="radio radio-primary">
                <label>
                    <input name="paymentMode" id="paymentModeDebit" value="paymentModeDebit" checked="" type="radio">
                    Debit Card
                </label>
            </div>
            <div class="radio radio-primary">
                <label>
                    <input name="paymentMode" id="paymentModeCredit" value="paymentModeCredit" type="radio">
                    Credit Card
                </label>
            </div>
            <div class="radio radio-primary">
                <label>
                    <input name="paymentMode" id="paymentModeNetbanking" value="paymentModeNetbanking" type="radio">
                    Net Banking
                </label>
            </div>
            <div class="radio radio-primary">
                <label>
                    <input name="paymentMode" id="paymentModeWallet" value="paymentModeWallet" type="radio">
                    Wallets <i class="text-yellow">(Additional 5% off)</i>
                </label>
            </div>
            <div class="radio radio-primary">
                <label>
                    <input name="paymentMode" id="paymentModeCash" value="paymentModeCash" type="radio">
                    Cash On Delivery
                </label>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-xs-12">
            <button type="button" class="btn btn-tsz btn-raised btn-tszYellow full-width">Place order</button>
        </div>
    </form>
</div>
