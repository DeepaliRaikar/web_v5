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
        <title>Timesaverz - Subscription Packages</title>

        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid no-side-padding block-section" id="subscription-packages">
            <div class="container-fluid block-container">
                <p class="timesaverzHeading">
                    <span class="timesaverzHeadingText"><span>Timesaverz Subscription </span>Package</span>
                    <span class="heading-line"></span>
                </p>

                <div class="panel panel-default subscription-package-desc">
                    <div class="panel-body">
                        <p class="font-weight-regular" id="subscription-package-desc">Timesaverz Subscription Packages gives you the freedom &amp; the flexbility to bundle up various Home services
                            that make your life stress free! Customize your package by choosing from a wide range of services like Home Cleaning,
                            Car Spa, Pest Control, Handyman Services, etc &amp; enjoy amazing discounts, dedicated representatives and free inspections,
                            year long!</p>
                        <p class="font-weight-regular font-15">All our services have a <span class="text-yellow">turnaround time of 2 hours</span></p>
                    </div>
                    <div class="panel-footer text-center font-weight-bold text-grey font-16">Select any package and receive <b class="text-white">500 Special Minutes</b> on your birthdays!</div>
                </div>
                <div class="container-fluid no-side-padding block-section">
                    <!--rate card -->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center font-weight-regular card-elevation rate-card">
                        <ul>
                            <li class="rate-card-detail rate-card-heading">
                                <div class="package-name text-blue font-20 font-weight-bold text-upper">Bronze</div>
                                <div class="package-price text-yellow"><span class="font-30">&#8377; </span><span class="font-weight-bolder font-40" id="package-price">499</span></div>
                                <div class="text-grey">Per Year</div>
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
                            <li class="rate-card-footer">
                                <button class="btn btn-raised btn-tsz btn-tszYellow">Select Package</button>
                            </li>
                        </ul>
                    </div>
                    <!-- rate card -->
                    <!--rate card -->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center font-weight-regular card-elevation rate-card promoted">
                        <ul>
                            <li class="rate-card-detail rate-card-heading">
                                <div class="package-name text-blue font-20 font-weight-bold text-upper">Bronze</div>
                                <div class="package-price text-yellow"><span class="font-30">&#8377; </span><span class="font-weight-bolder font-40" id="package-price">499</span></div>
                                <div class="text-grey">Per Year</div>
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
                            <li class="rate-card-footer">
                                <button class="btn btn-raised btn-tsz btn-tszYellow">Select Package</button>
                            </li>
                        </ul>
                    </div>
                    <!-- rate card -->
                    <!--rate card -->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center font-weight-regular card-elevation rate-card">
                        <ul>
                            <li class="rate-card-detail rate-card-heading">
                                <div class="package-name text-blue font-20 font-weight-bold text-upper">Bronze</div>
                                <div class="package-price text-yellow"><span class="font-30">&#8377; </span><span class="font-weight-bolder font-40" id="package-price">499</span></div>
                                <div class="text-grey">Per Year</div>
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
                            <li class="rate-card-footer">
                                <button class="btn btn-raised btn-tsz btn-tszYellow">Select Package</button>
                            </li>
                        </ul>
                    </div>
                    <!-- rate card -->
                    <!--rate card -->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center font-weight-regular card-elevation rate-card">
                        <ul>
                            <li class="rate-card-detail rate-card-heading">
                                <div class="package-name text-blue font-20 font-weight-bold text-upper">Bronze</div>
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
                            <li class="rate-card-footer">
                                <button class="btn btn-raised btn-tsz btn-tszYellow">Select Package</button>
                            </li>
                        </ul>
                    </div>
                    <!-- rate card -->

                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/subscription-packages.js" ></script>

        <script type="text/javascript" src="js/non-index-scripts.js" ></script>
        <?php require_once("includes/footer.php"); ?>
        <?php require_once("search-overlay.php"); ?>
        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>
