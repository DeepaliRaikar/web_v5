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
    <title>Timesaverz - Quick Book A Service</title>
    <?php require_once("includes/headerInjector.php"); ?>

    <link rel="stylesheet" type="text/css" href="css/lead-capture.css" />
</head>
<body>
<?php require_once("includes/header-quickbook.php"); ?>
<div class="mainSec mainContent col-md-12 col-sm-12 col-xs-12">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12 main-section-container">
                <div class="col-md-7 col-sm-6 col-xs-12 how-can-we-help-text">
                    <img src="/img/how-can-we-help.png" />

                    <ul class="col-md-12 col-sm-12 col-xs-12 benefits">
                        <li class="col-md-4 col-sm-6 col-xs-12"></li>
                        <li class="col-md-4 col-sm-6 col-xs-12"></li>
                        <li class="col-md-4 col-sm-6 col-xs-12"></li>
                    </ul>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12 leadFormContainer">
                    <div class="col-md-10 col-sm-10 col-xs-12 leadForm">
                        <form id="newLeadForm" name="generateLeadForm" class="form-horizontal" method="post" enctype="multipart/form-data" data-parsley-validate>
                            <div class="leadDetails">
                                <!--- Supercategories -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Choose A Category <span class="asterisk">*</span>
                                    </label>
                                    <select class="form-control wide" data-live-search="true" id="supercategories" required onchange="loadCategories();">
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                    </select>
                                </div>

                                <span class="clearfix"></span>
                                <!--- Categories -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 categorySelection">
                                    <label class="control-label">Choose A Service <span class="asterisk">*</span>
                                    </label>
                                    <select class="form-control wide" data-live-search="true" id="categories" required onchange="javascript: loadSubcategories();">
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                    </select>
                                </div>
                                <span class="clearfix"></span>

                                <!--- Customer Number -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Name <span class="asterisk">*</span>
                                    </label>
                                    <div class="form-group label-floating customerDetails">
                                        <input type="text" id="userFullName" name="userFullName" class="form-control" required>
                                    </div>
                                </div>
                                <span class="clearfix"></span>

                                <!--- Customer Number -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 customerMobileNumber">
                                    <div><label class="control-label">Mobile Number <span class="asterisk">*</span></label></div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 input-group-dropdown-button no-side-padding">
                                        <select id="countryCode" class="form-control wide">
                                            <option value="91">+91</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-2 col-xs-8 input-group-dropdown-text no-side-padding">
                                        <input id="customerMobileNumber" required name="customerMobileNumber" maxlength="10" class="form-control" type="number">
                                    </div>
                                </div>
                                <span class="clearfix"></span>


                                <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 text-center">
                                       <button type="button" class="btn btn-raised btn-tsz btn-tszYellow" onclick="javascript: generateCaptureLead();" style="width: 100%;">Submit</button>
                                    </div>
                                </div>
                                <span class="clearfix"></span>

                            </div>
                            <span class="clearfix"></span>

                            <div class="otherDetails">
                                <!--- Subcategories -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 subcategorySelection">
                                    <label class="control-label">Choose A Subcategory <span class="asterisk">*</span>
                                    </label>
                                    <select class="form-control wide" data-live-search="true" id="subcategories" required onchange="javascript: loadVariables();">
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                        <option value=''>Choose One</option>
                                    </select>
                                </div>
                                <span class="clearfix"></span>
                                <!--- Variables -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 variableSelection">
                                    <label class="control-label">Choose A Variable <span class="asterisk">*</span>
                                    </label>
                                    <select class="form-control wide" data-live-search="true" id="variables" name="variableID" required onchange="javascript: priceChange();">
                                    </select>
                                </div>
                                <span class="clearfix"></span>

                                <!--- Coupon Code -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Coupon Code
                                    </label>
                                    <div class="form-group label-floating customerDetails">
                                        <input type="text" id="couponCode" name="couponCode" class="form-control" required disabled>
                                    </div>
                                </div>
                                <span class="clearfix"></span>


                                <!--- Customer Address -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Address <span class="asterisk">*</span>
                                    </label>
                                    <div class="form-group label-floating customerDetails">
                                        <textarea id="userAddress" name="userAddress" maxlength="100" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <span class="clearfix"></span>

                                <!-- Area -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 areaSelect">
                                    <!-- <label class="col-sm-12 col-md-12 control-label labelsNewTimesaver">Choose an Area <span class="asterisk">*</span>
                                    </label> -->
                                    <label class="control-label">Select Area <span class="asterisk">*</span></label>
                                    <div class="form-group label-floating customerDetails">
                                        <input type="text" id="city-area" name="city-area" class="form-control" required>
                                    </div>
                                </div>
                                <span class="clearfix"></span>

                                <!--- Customer Email -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceSchedule quickBookSechedule">
                                    <label class="control-label">Schedule Service <span class="asterisk">*</span></label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#schedule-dialog" class="btn btn-sup btn-material-pink show-modal">
                                        <h4><i class="material-icons highlight">event_note</i>
                                            <span id="serviceDateTime">Schedule Service</span></h4>
                                    </a>
                                </div>
                                <span class="clearfix"></span>

                                <div class="form-group text-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3><span class="highlight">Total Cost: </span>
                                            <span id="totalCost"></span></h3>
                                    </div>
                                </div>
                                <span class="clearfix"></span>

                                <div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 text-center">
                                    <button type="button" class="btn btn-raised btn-tsz btn-tszYellow" onclick="updateLead();" style="width: 100%;">Submit</button>
                                </div>
                                <span class="clearfix"></span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END WRAPPER -->

<!-- WHAT WE'LL DO -->
<div class="what-we-do col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container-fluid block-container no-side-padding">
        <p class="header-text">

                <span class="serviceSelection" style="display: none;">
                    <span class="categoryNameSelection"></span>
                    <span class="highlight">
                        <span class="underline"><span class="superCategoryNameSelection"></span></span></span> SERVICE IN
                        <span>
                        </span>
                </span>
        </p>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 what-we-do-text">
            <h3 class="subheading-text">What We'll Do</h3>
            <p id="leadCaptureServiceDescription">
                A clean home is a happy home. Timesaverz brings professional home cleaning services right to your doorstep across your city. All our agents are background verified and equipped with the latest equipment and chemicals to ensure that your house is left spotlessly clean and sanitised. Choose from a wide range of services ranging from deep home cleaning, sofa cleaning, kitchen cleaning,bathroom cleaning, carpet cleaning, water tank cleaning services, fridge cleaning, car interior cleaning, car spa, car exterior cleaning, mattress cleaning and a whole lot more sanitisation services!
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 what-we-do-image">
            <img src="/img/cleaning.png">

            <span class="categoryHeading">CLEANING</span>
        </div>
    </div>
</div>
<!-- WHAT WE'LL DO END-->

<span class="clearfix"></span>
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

<!--What people say about our service end-->
<div class="container-fluid block-section" id="whatPeopleSay">
    <div class="block-container">
        <div class="col-md-12 col-sm-12 col-xs-12">
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

<?php require_once("includes/footer.php"); ?>
<?php require_once("search-overlay.php"); ?>
<script type="text/javascript" src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<?php require_once("includes/footerInjector.php"); ?>

<script type="text/javascript" src="js/quick-booking.js"></script>
<script>

    // select area autocomplete
    var options = {
        url: "resources/city-areas.json",

        categories: [{
            listLocation: "cityAreas"
        }],

        list: {
            match: {
                enabled: false
            },
            maxNumberOfElements: 10
        },

        theme: "light"
    };

    $("#city-area").easyAutocomplete(options);
</script>
</body>
</html>