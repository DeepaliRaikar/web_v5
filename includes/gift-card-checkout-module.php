<?php
/**
 * Created by PhpStorm.
 */
?>
<div class="container-fluid no-side-padding" id="gift-card-details">
    <div class="panel-group accordion" id="giftCardAccordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default" id="gift-card-selection-step">
            <div class="panel-heading" role="tab" id="giftCardTypeHeader">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#giftCardAccordion" href="#giftCardTypeModule" aria-expanded="true" aria-controls="giftCardTypeModule">
                        Gift Card Selection
                        <span class="step-options">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                    </a>
                </h4>
            </div>
            <div id="giftCardTypeModule" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="giftCardTypeHeader">
                <div class="panel-body">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-md-offset-1 col-xs-12">
                        <div class="container-fluid no-side-padding">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-side-padding">
                                <div class="radio radio-primary">
                                    <label>
                                        <input name="giftCardType" value="loadedWithBalance" checked="checked" type="radio" data-gift-card-type="gift-card-type-balance" data-gift-card-selection="addBalance" onchange="javascript: changeGiftCardType(this);">
                                        Load Balance
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-side-padding">
                                <div class="radio radio-primary">
                                    <label>
                                        <input name="giftCardType" value="loadedWithService" type="radio" data-gift-card-type="gift-card-type-service" data-gift-card-selection="addService" onchange="javascript: changeGiftCardType(this);">
                                        Load Service
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- if loaded with balance -->
                        <div class="col-md-12 col-sm-12 col-xs-12 no-side-padding">
                            <div class="addBalance selection-block">
                                <div class="form-group label-floating">
                                    <input id="addBalance" class="form-control" name="giftCardBalance" type="number" maxlength="5" placeholder="Enter Gift Card Amount">
                                </div>
                            </div>
                            <div class="addService selection-block tsz-hidden">
                                <!--- Service City -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                    <select class="form-control" id="cityID" name="cityID" onchange="loadSupercategories();">
                                        <option value=''>Select a City</option>
                                        <option value='mumbai'>Mumbai</option>
                                        <option value='pune'>Pune</option>
                                        <option value='gurgaon'>Gurgaon</option>
                                        <option value='delhi'>Delhi</option>
                                        <option value='hyderabad'>Hyderabad</option>
                                    </select>
                                </div>

                                <!--- Supercategories -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                    <select class="form-control" data-live-search="true" id="supercategories" name="supercategories" onchange="loadCategories();">
                                        <option value=''>Choose a Category</option>
                                        <option value='cleaning'>Cleaning</option>
                                        <option value='repairs'>Repairs</option>
                                        <option value='pest-control'>Pest-Control</option>
                                        <option value='painting'>Painting</option>
                                        <option value='home-interiors'>Home-Iteriors</option>
                                    </select>
                                </div>

                                <!--- Categories -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 categoriesSection no-side-padding tsz-hidden">
                                    <select class="form-control" data-live-search="true" id="categories" name="categories" onchange="loadSubcategories();">
                                        <option value=''>Choose a Service</option>
                                        <option value='service1'>service1</option>
                                        <option value='service2'>service2</option>
                                        <option value='service3'>service3</option>
                                    </select>
                                </div>

                                <!--- Subcategories -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 subcategoriesSection no-side-padding tsz-hidden">
                                    <select class="form-control" data-live-search="true" id="subcategories" name="subcategories" onchange="loadVariables();">
                                        <option value=''>Select a Service</option>
                                        <option value='variable1'>variable1</option>
                                        <option value='variable2'>variable2</option>
                                        <option value='variable3'>variable3</option>
                                    </select>
                                </div>

                                <!--- Variables -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 variablesSection no-side-padding tsz-hidden">
                                    <select class="form-control" data-live-search="true" id="variables" name="variables" onchange="setSelectedService();">
                                        <option value=''>Select a Service</option>
                                        <option value='service1'>Service1</option>
                                        <option value='service2'>Service2</option>
                                    </select>
                                </div>

                                <p class="text-center font-14 text-grey font-weight-bold">
                                    Gift Card Total: <span class="text-yellow font-22">&#8377; <span id="gift-card-total">0</span></span>

                                </p>
                            </div>
                            <div class="container-fluid no-side-padding">

                                <div class="form-group label-floating">
                                    <textarea rows="3" id="cardMessage" name="cardMessage" class="form-control cardMessage" placeholder="Your Message Here" required></textarea>
                                    <span class="help-block">Time to get creative :)</span>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-xs-12">
                                <button class="btn btn-tsz btn-raised btn-tszYellow full-width" onclick="javascript: proceedToNextStep(this);">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="recipient-details-step">
            <div class="panel-heading" role="tab" id="recipientsDetailsHeader">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#giftCardAccordion" href="#recipientDetailsModule" aria-expanded="false" aria-controls="recipientDetailsModule">
                        Recipient Details
                        <span class="step-options">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                    </a>
                </h4>
            </div>
            <div id="recipientDetailsModule" class="panel-collapse collapse" role="tabpanel" aria-labelledby="recipientDetailsHeader">
                <div class="panel-body">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-md-offset-1 col-xs-12">
                        <div class="container-fluid no-side-padding">
                            <div class="form-group label-floating">
                                <input id="recipientName" required name="recipientName" class="form-control recipientName" placeholder="Name" type="text">
                                <span class="help-block">Enter the recipient's full name here</span>
                            </div>


                            <!--mobile number -->
                            <div class="form-group recipientMobileNumber input-group-text-dropdown">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 input-group-dropdown-button">
                                        <select id="recipientCountryCode" class="form-control">
                                            <option value="91">+91</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-2 col-xs-8 input-group-dropdown-text">
                                        <input id="recipientMobileNumber" placeholder="Recipients Mobile Number" required name="recipientMobileNumber" maxlength="10" class="form-control" type="number">
                                        <span class="help-block">We will notify them through SMS</span>
                                    </div>
                                </div>
                            </div>
                            <!--mobile number end -->

                            <div class="form-group label-floating">
                                <input id="recipientEmail" required name="recipientEmail" placeholder="Email address" class="form-control recipientEmail" type="email">
                                <span class="help-block">We will deliver the Gift Card to their Inbox</span>
                            </div>

                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-xs-12">
                                <button class="btn btn-tsz btn-raised btn-tszYellow full-width" onclick="javascript: proceedToNextStep(this);">Next</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="add-address-step">
            <div class="panel-heading" role="tab" id="addressDetailsHeader">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#giftCardAccordion" href="#addressDetailsModule" aria-expanded="false" aria-controls="addressDetailsModule">
                        Your Details
                        <span class="step-options">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                    </a>
                </h4>
            </div>
            <div id="addressDetailsModule" class="panel-collapse collapse" role="tabpanel" aria-labelledby="addressDetailsHeader">
                <div class="panel-body">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-md-offset-1 col-xs-12">
                        <div class="container-fluid no-side-padding">
                            <div class="form-group label-floating">
                                <input id="senderName" required name="senderName" class="form-control senderName" placeholder="Name" type="text">
                                <span class="help-block">So that the recipient knows who's it coming from</span>
                            </div>


                            <!--mobile number -->
                            <div class="form-group senderMobileNumber input-group-text-dropdown">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 input-group-dropdown-button">
                                        <select id="yourCountryCode" class="form-control">
                                            <option value="91">+91</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-2 col-xs-8 input-group-dropdown-text">
                                        <input id="senderMobileNumber" placeholder="Your Mobile Number" required name="senderMobileNumber" maxlength="10" class="form-control" type="number">
                                        <span class="help-block">So we can notify you about the Gift Card as well</span>
                                    </div>
                                </div>
                            </div>
                            <!--mobile number end -->

                            <div class="form-group label-floating">
                                <input id="senderEmail" required name="SenderEmail" placeholder="Email address" class="form-control senderEmail" type="email">
                                <span class="help-block">We would like to keep you in loop</span>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-xs-12">
                                <button class="btn btn-tsz btn-raised btn-tszYellow full-width" onclick="javascript: proceedToNextStep(this);">Next</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="payment-step">
            <div class="panel-heading" role="tab" id="paymentDetailsHeader">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#giftCardAccordion" href="#paymentDetailsModule" aria-expanded="false" aria-controls="paymentDetailsModule">
                        Payment
                        <span class="step-options">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                    </a>
                </h4>
            </div>
            <div id="paymentDetailsModule" class="panel-collapse collapse" role="tabpanel" aria-labelledby="paymentDetailsHeader">
                <div class="panel-body">
                    <?php
                    require_once("includes/payment-module.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
