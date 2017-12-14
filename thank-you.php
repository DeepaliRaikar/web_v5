<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 23-01-2017
 * Time: 12:22
 */
require("router.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Timesaverz - Thank You</title>

        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid" id="booking-thank-you">
            <div class="block-container row block-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                        <!-- list group for booked services-->
                        <div class="list-group card-elevation">
                            <div class="list-group-item row-content-full">
                                <div class="row-content text-center">
                                    <div class="img-circle" id="img-success">
                                        <img src="img/booking-successful-check.png" alt="booking-successful"/>
                                    </div>
                                    <p class="success-message font-18 list-group-item-text"><b>Service Successfully Booked!</b></p>
                                    <p class="list-group-item-text bookedServiceSchedule font-14 text-grey">In 12mins 23 secs </p>
                                </div>
                            </div>
                            <div class="list-group-separator row"></div>

                            <div class="list-group-item serviceDetailsCard">
                                <div class="row-picture">
                                    <img src="img/serviceicon.png" alt="icon">
                                </div>
                                <div class="row-content">
                                    <h5 class="font-15"><b>Home Cleaning: Basic 3bhk</b></h5>
                                    <p class="list-group-item-text bookedServiceSchedule font-14">18 Dec 2016, 10am - 1am </p>
                                </div>
                            </div>
                            <div class="list-group-separator"></div>
                            <div class="list-group-item serviceDetailsCard">
                                <div class="row-picture">
                                    <img src="img/serviceicon.png" alt="icon">
                                </div>
                                <div class="row-content">
                                    <h5 class="font-15"><b>Home Cleaning: Basic 3bhk</b></h5>
                                    <p class="list-group-item-text bookedServiceSchedule font-14">18 Dec 2016, 10am - 1am </p>
                                </div>
                            </div>
                            <div class="list-group-separator"></div>
                            <div class="list-group-item row-content-full">
                                <div class="row-content text-center text-yellow">
                                    <p class="font-26 grand-total list-group-item-text"><b>&#8377;<span id="grand-total">1499</span></b></p>
                                    <p class="list-group-item-text bookedServiceSchedule font-14">
                                        You saved <b>&#8377;<span id="discount-received">350</span></b> on this order
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- list group for booked services end-->
                    </div>
                    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12 text-center">
                        <button class="btn btn-tsz btn-tszYellow btn-raised">Book another service</button>
                    </div>

                </div>
            </div>
        </div>
        <?php require_once("includes/footer.php"); ?>

        <?php require_once("search-overlay.php"); ?>

        <script type="text/javascript" src="js/non-index-scripts.js" ></script>

        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>
