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
        <title>Timesaverz - Subscription Package Cart</title>

        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid" id="subscription-package-cart">
            <div class="block-container row block-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="timesaverzHeading">
                        <span class="timesaverzHeadingText"><span>Timesaverz Subscription </span>Package</span>
                        <span class="heading-line"></span>
                    </p>
                </div>

                <div class="col-lg-12 col-d-12 col-sm-12 col-xs-12">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <?php
                            require_once("includes/cart-checkout-steps-module.php");
                        ?>
                    </div>
                    <!--cart items displayed to the right-->
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 cart-items-right">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation">
                            <div class="container-fluid block-container">
                                <div class="block-container text-center font-weight-regular rate-card">
                                    <ul>
                                        <li class="rate-card-detail rate-card-heading">
                                            <div class="form-group">
                                                <select class="form-control text-center font-18 font-weight-bold text-upper text-blue" id="subscription-package-selected" onchange="javascript: changeSubscriptionPackage();">
                                                    <option value="bronze">Bronze</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="gold">Gold</option>
                                                    <option value="platinum">Platinum</option>
                                                </select>
                                            </div>
                                            <div class="package-price text-yellow"><span class="font-30">&#8377; </span><span class="font-weight-bolder font-40" id="package-price">499</span></div>
                                            <div class="text-grey package-duration">Per Year</div>
                                        </li>
                                        <li class="rate-card-detail">
                                            <b>15% Discount</b> on Every Booking
                                        </li>
                                        <li class="rate-card-detail">
                                            <b>3+ Rated</b> Service Partners
                                        </li>
                                        <li class="rate-card-detail text-grey">
                                            <b>0 <span class="text-upper">free</span></b> Inspection Jobs Per Year
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--selected address displayed here -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation selected-address tsz-hidden" id="selected-address"></div>
                        <!--selected address displayed here end -->
                    </div>

                    <!--cart items displayed to the right end-->
                </div>
            </div> <!-- Block container.block section --->
        </div><!-- container fluid-->


        <?php require_once("includes/footer.php"); ?>

        <?php require_once("search-overlay.php"); ?>

        <script type="text/javascript" src="js/subscription-package-cart.js"></script>

        <script type="text/javascript" src="js/non-index-scripts.js"></script>

        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>



