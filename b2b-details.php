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
        <title>Timesaverz - B2B Landing</title>

        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
    <?php require_once("includes/header.php"); ?>
        <div class="container-fluid block-section" id="b2b-details">
            <div class="container-fluid block-container">
                <p class="timesaverzHeading">
                    <span class="timesaverzHeadingText"><span>Partner </span>with us</span>
                    <span class="heading-line"></span>
                </p>

                <div class="panel panel-default">
                    <div class="panel-body no-padding">
                        <img src="img/b2b-landing.png" style="width: 100%;height: auto;"/>
                    </div>
                    <div class="panel-footer text-center font-weight-regular text-white font-16">Timesaverz is a preferred choice for on demand repair and maintenance services.
                        We enable clients in 6 cities across India to manage their day to day chores. </div>
                </div>
                <div class="container-fluid block-section no-side-padding">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="row">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText"><span>HOME PRODUCTS </span>BRAND</span>
                                <span class="heading-line"></span>
                            </p>
                            <p>
                                We work with leading online and offline brands in the business of selling furniture, heavy appliances, and hospitality industry as assembly,
                                installation and maintenance partners. We help them focus on their core business while we take care of the support function through a well
                                trained workforce. Need help? Just let us know what it is that we can help you with and we will touch base with you soon.
                            </p>
                        </div>
                        <div class="row">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText"><span>Corporate </span>ENGAGEMENT</span>
                                <span class="heading-line"></span>
                            </p>
                            <p>
                                We work with leading HR units across the country in terms of aiding work life balance for their employees through various employee
                                engagement and benefit packages exclusively customized to suit their organisation's needs. Connect with us to know more.
                            </p>
                        </div>
                        <div class="row">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText"><span>RESIDENTIAL </span>SOCIETY</span>
                                <span class="heading-line"></span>
                            </p>
                            <p>
                                With the concept of smart societies gaining grounds, we have been able to work closely with the housing society management to help their
                                residents get easy and trusted help for their various home chores apart from helping the societies streamline and manage their work
                                processes. If you are in the management of any such society and want to know more about our services, write to us.
                            </p>
                        </div>
                        <br/>
                        <div class="row">
                            <p class="text-left">
                                Interested? Just fill in the form or call us on 9022711888 and we’ll help you #savetheday
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 no-side-padding b2b-lead-form-wrapper">
<!--                        <div class="col-md-12 col-sm-12 col-xs-12 helper-text">-->
<!--                            <h4 class=" text-center"> </h4>-->
<!--                        </div>-->
                        <div class="container-fluid b2bLeadForm no-side-padding">
                            <form name="b2bDetails">
                                <fieldset class="scheduler-border">
                                    <legend class="font-18 scheduler-border font-weight-regular">Please help us with the following details:</legend>
                                    <div class="form-group representingValue">
                                        <label class="control-label font-weight-regular">I represent<span class="asterisk">*</span>
                                        </label>
                                        <!-- <div class="col-sm-12 col-md-12"> -->
                                        <select  id="representingValue" class="form-control wide" required onchange="changeNameLabel(this);">
                                            <option value=''>Choose one</option>
                                            <option value='Brand'>Brand</option>
                                            <option value='Corporate'>Corporate</option>
                                            <option value='Residential Society'>Residential Society</option>
                                            <option value='Others'>Others</option>
                                        </select>
                                        <!-- </div> -->
                                    </div>

                                    <div class="form-group serviceProvided">
                                        <label class="control-label font-weight-regular">Choose a Service<span class="asterisk">*</span>
                                        </label>
                                        <!-- <div class="col-sm-12 col-md-12"> -->
                                        <select id="serviceProvided" class="form-control wide font-weight-regular" required>
                                            <option value=''>Choose one</option>
                                            <option value='Office Cleaning'>Office Cleaning</option>
                                            <option value='Pest Control Services'>Pest Control Services</option>
                                            <option value='AC Repair and Maintenance'>AC Repair and Maintenance</option>
                                            <option value='Furniture Assembly'>Furniture Assembly</option>
                                            <option value='Carpet / Chair shampooing'>Carpet / Chair shampooing</option>
                                            <option value='Employee Benefit Program'>Employee Benefit Program</option>
                                        </select>
                                        <!-- </div> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="businessName" class="control-label font-weight-regular">Name<span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="businessName">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessEmail" class="control-label font-weight-regular">Email<span class="asterisk">*</span></label>
                                        <input type="email" class="form-control" id="businessEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessPhone" class="control-label font-weight-regular">Phone<span class="asterisk">*</span></label>
                                        <input type="number" class="form-control" id="businessPhone" maxlength="15" min="7000000000" max="999999999999999" />
                                    </div>
                                    <div class="form-group">
                                        <label for="businessCompanyName" class="control-label font-weight-regular"><span class="businessCompanyName">Company</span><span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="businessCompanyName">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessCity" class="control-label font-weight-regular">City<span class="asterisk">*</span></label>
                                        <input type="text" class="form-control" id="businessCity">
                                    </div>
                                    <div class="form-group">
                                        <label for="comments" class="control-label font-weight-regular">Comments</label>
                                        <textarea class="form-control" id="comments" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                                        <button type="button" class="btn btn-raised btn-tsz btn-tszYellow full-width" onclick="jaascript: sendB2BDetails();">Submit</button>
                                    </div>
                                    <input type="hidden" name="representingValueType" id="representingValueType">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/b2b-details.js" ></script>

        <script type="text/javascript" src="js/non-index-scripts.js" ></script>
        <?php require_once("includes/footer.php"); ?>
        <?php require_once("search-overlay.php"); ?>
        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>
