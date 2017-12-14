<?php
/**
 * Created by PhpStorm.
 */
require("router.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Timesaverz - Offers</title>
        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid" id="offers">
            <div class="block-container row block-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid no-side-padding">
                        <p class="timesaverzHeading">
                            <span class="timesaverzHeadingText"><span>Offers</span> at Timesaverz</span>
                            <span class="heading-line"></span>
                        </p>
                    </div>
                    <div class="container-fluid no-side-padding">
                        <div class="col-md-12 col-sm-12 col-xs-12 filters-container">
                            <ul id="filters" class="clearfix font-weight-regular">
                                <li><span class="filter active" data-filter="all">All</span></li>
                                <li><span class="filter" data-filter="coupon-cleaning">Cleaning</span></li>
                                <li><span class="filter" data-filter="coupon-beauty">Beauty</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="container-fluid no-side-padding deals">
                        <div class="col-md-6 col-sm-6 col-xs-12 portfolio offer-coupon coupon-beauty">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-6">
                                    <div class="offerRate"><h4>Get 15% DISCOUNT</h4><h4>Waxing-Beauty</h4></div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-6">
                                    <p>
                                        Use coupon: <b>WOW</b><br>Minimum Order: <b>₹100</b><br>Expires: <b>31 Aug, 2017</b></p>
                                    <div class="couponCode btn btn-tsz btn-tszYellow" id="couponCodeCopy" data-clipboard-target="#code0" alt="Click to copy the coupon code" style="float: right">Copy Code <span style="display:none" id="code0">WOW</span><div class="ripple-container"></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 portfolio offer-coupon coupon-cleaning">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-6">
                                    <div class="offerRate"><h4>Get 15% DISCOUNT</h4><h4>Home Cleaning</h4></div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-6">
                                    <p>
                                        Use coupon: <b>WOW</b><br>Minimum Order: <b>₹100</b><br>Expires: <b>31 Aug, 2017</b></p>
                                    <div class="couponCode btn btn-tsz btn-tszYellow" id="couponCodeCopy" data-clipboard-target="#code1" alt="Click to copy the coupon code" style="float: right">Copy Code <span style="display:none" id="code1">WOW</span><div class="ripple-container"></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 text-center noCouponText tsz-hidden">
                            <p class="font-26 font-weight-bold text-upper">Sorry!</p>
                            <p class="font-20 font-weight-light"> We do not have any offers running for this category.</p>
                        </div>

                        <div id="copyCouponCode" data-clipboard-target="" style="visibility: hidden;"><span id=""></span></div>

                </div>
            </div> <!-- block container -->
            </div>
        </div> <!-- container fluid -->
    <?php require_once("includes/footer.php"); ?>
    <?php require_once("search-overlay.php"); ?>
    <script type="text/javascript" src="js/non-index-scripts.js"></script>
    <script type="text/javascript" src="js/offers.js"></script>
    <script type="text/javascript" src="js/clipboard.min.js"></script>
    <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>

