<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 16-01-2017
 * Time: 15:18
 */
require("router.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Timesaverz - Book Service</title>

    <?php require_once("includes/headerInjector.php"); ?>
</head>
<body>
    <?php require_once("includes/header-servicepage.php"); ?>
    <div class="container-fluid mainContent">
        <div class="block-container row block-section">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cartServiceDetails">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- details for more than 1 service booked-->
                    <div class="container-fluid box-elevation">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="list-group border-right">
                                <div class="list-group-item serviceDetailsCard">
                                    <div class="row-picture serviceCardIcon" id="bookingImageIcon">
                                        <img class="transparent-background" src="" alt="icon">
                                    </div>
                                    <div class="row-content bookedServiceDetails">
                                        <h5 class="font-15 service-booked"><b>Home Cleaning: Basic 3bhk</b></h5>
                                        <p class="list-group-item-text bookedServiceSchedule font-14">18 Dec 2016, 10am - 1am </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 cartItemsCountDetailsTotal">
                            <div class="cartItemsCountDetails">
                                <span class="cartItemsCount text-yellow"></span> items added in Cart
                            </div>
                            <div>
                                <span class="text-grey">Sub Total</span> &#8377; <span class="cartTotal"></span></span>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-3 col-sm-12 col-xs-12 moreActions">
                            <a class="btn btn-tsz btn-tszGrey" href="cart">checkout</a>
                            <a class="btn btn-tsz btn-tszYellow" href="/">Book another service</a>
                        </div>
                    </div>
                    <!-- details for more than 1 service booked end-->

<!--                    details if only one service is boooked-->
                   <!-- <div class="container-fluid box-elevation">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-right">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCardIcon">
                                    <img src="img/serviceicon.png">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bookedServiceDetails">
                                    <label class="text-blue">
                                        Home Cleaning: Basic 3bhk
                                    </label>
                                    <div class="bookedServiceSchedule">
                                        18 Dec 2016, 10am - 1pm
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 cartItemsCountDetailsTotal">
                            <div class="cartItemsCountDetails">
                                <span class="cartItemsCount text-yellow">1</span> item added in Cart
                            </div>
                            <div>
                                <span class="text-grey">Sub Total</span> &#8377; <span class="cartTotal">799</span></span>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 moreActions">
                            <button class="btn btn-tsz btn-tszGrey">checkout</button>
                            <button class="btn btn-tsz btn-tszYellow">Book another service</button>
                        </div>
                    </div>
<!--                    details if only one service is boooked end-->
                </div>
            </div>
        </div>
        <!--provide classname as 'backgroundOverlaycleaning' where cleaning is a supercatrgory name, for repirs it will be 'backgroundOverlayrepairs' -->
        <div class="block-container row block-section" id="handpickedServices">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="timesaverzHeading">
                    <span class="timesaverzHeadingText">People also bought with<gitspan> Timesaverz </gitspan></span>
                    <span class="heading-line"></span>
                </p>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="searchHandpickedServices">
                <a href="#">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                            <img src="img/placeholder.gif" width="100%" />
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                            <img src="img/placeholder.gif" width="100%" />
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                            <img src="img/placeholder.gif" width="100%" />
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--Testimonials end-->

    <?php require_once("includes/footer.php"); ?>

    <?php require_once("search-overlay.php"); ?>
    <script type="text/javascript" src="js/non-index-scripts.js"></script>
    <script type="text/javascript" src="js/booking-details.js?ver=<?php echo($TSZversioncode); ?>"></script>
    <?php require_once("includes/footerInjector.php"); ?>
</body>
</html>

