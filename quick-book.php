<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 10-01-2017
 * Time: 13:04
 */
//$pageCanonicalName = "service";
//require("router.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Timesaverz</title>
    <?php require_once("includes/headerInjector.php"); ?>

    <script>
        /**
         * Getting JSON for this service page and JSONify that
         **/
        var dataForServicePage = JSON.parse('<?php echo(addslashes(json_encode($TSZgetInitArrayForService,JSON_HEX_APOS))); ?>');
    </script>
</head>
<body>
<?php require_once("includes/header.php"); ?>
<div class="container-fluid mainContent">
    <!--provide classname as 'backgroundOverlaycleaning' where cleaning is a supercatrgory name, for repirs it will be 'backgroundOverlayrepairs' -->
    <div class="row serviceSelection" style="background-color: #231f20;">
        <div class="container-fluid block-container">
            <div class="col-md-12 col-sm-12 col-xs-12 serviceDetails no-side-padding" id="quick-book">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 card-elevation">
                        <div class="serviceDetailsContainer" id="serviceDetails">
                            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                <p class="font-24 service-details-heading">Our Cleaning Service</p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                <p>A clean home is a happy home. Timesaverz brings professional home
                                    cleaning services at your doorstep across Mumbai, Navi Mumbai and Thane. All our agents
                                    are background verified and equipped with the latest equipments and chemicals to ensure that
                                     your house is left spotlesslyclean and sanitised. Choose from a wide range of services
                                    ranging from:
                                </p>
                                <ul>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Deep Home Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Carpet Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Sofa Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Fridge Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Kitchen Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Car Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Bathroom Cleaning</li>
                                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Mattress Cleaning</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 bookingDetails">
                    <div class="col-md-12 col-sm-12 col-xs-12 card-elevation">
                        <div class="serviceDetailsContainer row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="font-24 text-yellow">Book a Service</p>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields no-side-padding" >
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <label for="subcategorySelection">Select Service</label>
                                    <select id="subcategorySelection" class="form-control wide">
                                        <option value="">Choose a service</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                    <label for="variableSelection">Select Type</label>
                                    <select id="variableSelection" class="form-control wide">
                                        <option value="">Choose one</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding selectionFields">
<!--                               name and mobile number-->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input class="form-control" id="customer-name" placeholder="Enter your Name here" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group customerMobileNumber">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 input-group-dropdown-button no-side-padding">
                                            <select id="countryCode" class="form-control">
                                                <option value="91">+91</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-2 col-xs-8 input-group-dropdown-text no-side-padding">
                                            <input id="customerMobileNumber" required name="customerMobileNumber" maxlength="10" class="form-control" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 selectionFields">
                                <div class="form-group label-static">
                                    <input class="form-control" id="coupon-code" placeholder="Enter coupon code" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                <div class="col-md-6 col-sm-6 col-xs-12"><label class="text-blue serviceTotalLabel">Service Total</label></div>
                                <div class="col-md-6 col-sm-6 col-xs-12 pull-right"><span class="font-20">&#8377;</span>
                                    <span class="serviceTotal font-28 font-weight-bold">
                                        1499
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="serviceFooter">
                            <button class="btn btn-tsz btn-tszYellow full-width book-service-button">BOOK SERVICE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--What people say about our service end-->
    <div class="container-fluid block-section" id="whatPeopleSay">
        <div class="block-container">
            <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                <p class="timesaverzHeading">
                    <span class="timesaverzHeadingText">What people say about our
                        <span>
                            <?php echo($TSZgetInitArrayForService["data"]["categoryName"]);?> Service
                        </span>
                    </span>
                    <span class="heading-line"></span>
                </p>
                <div class="row equalHeightContainer">
                    <?php
                    if(!isset($TSZgetInitArrayForService["data"]["reviews"]["data"]) && count($TSZgetInitArrayForService["data"]["reviews"]["data"])){
                        echo("No reviews available!");
                    }else{
                        foreach ($TSZgetInitArrayForService["data"]["reviews"]["data"] as $categoryReview){ ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 equalHeightItem">
                                <div class="container-fluid card-elevation equalHeightInnerContainer">
                                    <p><?php echo($categoryReview["additionalComments"]);?></p>
                                    <p>
                                        <span class="customerName"><strong><?php echo($categoryReview["userFullName"]);?></strong></span>
                                        <span class="starRating pull-right">
                                            <?php
                                            for($x=0;$x<5;$x++){
                                                if($x<$categoryReview["jobRating"]){?>
                                                    <i class="fa fa-star ratedStar"></i>
                                                <?php } else {?>
                                                    <i class="fa fa-star"></i>
                                                <?php }
                                            }
                                            ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--What people say about our service end-->

<!--how does timesaverz work-->
<div class="container-fluid block-section" id="tszWork" style="background-color: #fff;">
    <div class="block-container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p class="timesaverzHeading">
                <span class="timesaverzHeadingText">How Does <span>Timesaverz work?</span></span>
                <span class="heading-line"></span>
            </p>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <div class="col-md-4 col-sm-4 col-xs-12 tszWork">
                <div class="steps">Step 1</div>
                <div class="tszWorkImg"><img src="img/tsz-work/tsz-work-1.png"></div>
                <div><h4>Book a Service</h4></div>
                <div><p>From a wide range of home services</p></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 tszWork">
                <div class="steps">Step 2</div>
                <div class="tszWorkImg"><img src="img/tsz-work/tsz-work-2.png"></div>
                <div><h4>Pay</h4></div>
                <div><p>Before or after the service is done</p></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 tszWork">
                <div class="steps">Step 3</div>
                <div class="tszWorkImg"><img src="img/tsz-work/tsz-work-3.png"></div>
                <div><h4>Relax</h4></div>
                <div><p>While your home service gets done</p></div>
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <a href="" class="btn btn-tsz btn-raised btn-tszYellow">Book a home service</a>
        </div>
    </div>
</div>
<!--how does timesaverz work end-->


<?php require_once("includes/footer.php"); ?>
<?php require_once("search-overlay.php"); ?>
<script type="text/javascript" src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/non-index-scripts.js"></script>
<?php require_once("includes/footerInjector.php"); ?>
<script type="text/javascript" src="js/servicePage.js?ver=<?php echo($TSZversioncode);?>"></script>
</body>
</html>