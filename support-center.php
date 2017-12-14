<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 */
require("router.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Center - Timesaverz</title>

    <?php require_once("includes/headerInjector.php"); ?>
    <link rel="stylesheet" href="node_modules/fancybox/dist/css/jquery.fancybox.css" />
    <style>

    </style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="node_modules/bootstrap-vertical-tabs/bootstrap.vertical-tabs.min.css"/>
<?php require_once("includes/header-servicepage.php"); ?>
<div class="container-fluid no-side-padding" id="dashboard">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 no-side-padding" id="sidebar"> <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left" id="sidebar-options">
            <li class="text-center">
                <div class="container-fluid no-side-padding user-profile">
                    <p class="font-20 font-weight-regular text-blue text-upper" id="dashboard-user-name">Neha
                        Kapoor</p>
                    <p class="text-blue font-weight-regular">Referral Code : <span
                            class="font-weight-bold dashboard-user-referralcode">NEHA65</span></p>
                    <div class="container-fluid no-side-padding user-profile-image"><img src="img/profile_img.png"
                                                                                         class="img-circle"/></div>
                </div>
                <div class="text-yellow font-weight-bolder"><span class="font-30 dashboard-user-minutes">197</span> Minutes
                </div>
            </li>
            <li class="text-center">
                <button class="btn btn-raised btn-tsz btn-tszYellow" data-toggle="modal" data-target="#raise-new-ticket">Raise new ticket</button>
            </li>
        </ul>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="dashboard-right-content">
        <div class="container-fluid block-container" id="support-tickets">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs box-elevation text-center" role="tablist">
                <li role="presentation" class="active column-3"><a href="#support-tickets-all" aria-controls="support-tickets-all"
                                                                   role="tab" data-toggle="tab">All Tickets</a></li>
                <li role="presentation" class="column-3"><a href="#support-tickets-open" aria-controls="support-tickets-open"
                                                            role="tab" data-toggle="tab">Open</a></li>
                <li role="presentation" class="column-3"><a href="#support-tickets-closed" aria-controls="support-tickets-closed"
                                                            role="tab" data-toggle="tab">Closed</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content inner-tab-content">
                <div role="tabpanel" class="tab-pane  active" id="support-tickets-all">
                    <div class="panel-group accordion" id="support-center-tickets-all" role="tablist" aria-multiselectable="true">
                        <div class="support-ticket panel panel-default">
                            <div class="panel-heading" role="tab" id="support-ticket-all-header-1">
                                <h4 class="panel-title">
                                    <a data-parent="#support-center-tickets-all" href="#support-ticket-all-content-1" aria-expanded="true" aria-controls="support-ticket-all-content-1" data-toggle="collapse">
                                        Test Ticket
                                        <span class="step-options">
                                            <span class="ticket-status">Open</span>
                                            <i class="fa fa-chevron-down"></i>
                                        </span>
                                    </a>
                                    <div class="ticket-raise-details">
                                        <div class="font-weight-bold font-13 ticket-raise-time">
                                            28 June, 16 05:10 PM
                                        </div>
                                        <div class="font-weight-bold font-13 ticket-raise-platform">
                                            Category : App / Website
                                        </div>
                                    </div>
                                </h4>
                            </div>

                            <div id="support-ticket-all-content-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="support-ticket-all-header-1">
                                <div class="panel-body">
                                    <div class="font-weight-regular">Customer Care Executive: <span class="support-executive font-weight-bold font-18">Uzma Shaikh</span></div>
                                    <div class="container-fluid support-ticket-chat font-weight-regular">
                                        <div class="col-md-5 col-sm-8 col-xs-10 reply-message executive-reply tri-right left-in">
                                            <p>Hello</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-2 reply-message customer-reply tri-right right-in">
                                            <p>Hi!</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-2 reply-message customer-reply tri-right right-in">
                                            <p>Hi!</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-sm-8 col-xs-10 reply-message executive-reply tri-right left-in">
                                            <p>Hello</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-sm-8 col-xs-10 reply-message executive-reply tri-right left-in">
                                            <p>Hello</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-2 reply-message customer-reply tri-right right-in">
                                            <p>Hi!</p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-2 reply-message customer-reply tri-right right-in">
                                            <p><a class="single_image" rel="group1" href="img/banner_background.png"><img src="img/banner_background.png" alt="" style="width: 100%;"/></a></p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-2 reply-message customer-reply tri-right right-in">
                                            <p><a class="single_image" rel="group1" href="img/aboutService.png"><img src="img/aboutService.png" alt="" style="width: 100%;"/></a></p>
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="replyAnswer" rows="3" style="width: 100%;"></textarea>
                                            </div>
                                            <div id="previewImage" class="previewImage">
                                                <img id="output" class="img-responsive center-block"/>
                                                <i class="badge removeImage" id="removeImage">×</i>
                                            </div>
                                            <button type="button" id="btnReply" class="btn btn-raised btn-tsz btn-tszYellow" >Write Reply</button>
                                            <input type="file" name="uploadComplaintImage" id="uploadComplaintImage" class="inputfile uploadComplaintImage" accept="image/*"  onchange="javascript: loadFile(this);"/>
                                            <label for="uploadComplaintImage" class="btn btn-raised btn-tsz btn-tszBlue"><span><i class="material-icons">attachment</i></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="support-ticket panel panel-default">
                            <div class="panel-heading" role="tab" id="support-ticket-all-header-2">
                                <h4 class="panel-title">
                                    <a data-parent="#support-center-tickets-all" href="#support-ticket-all-content-2" aria-expanded="true" aria-controls="support-ticket-all-content-2" data-toggle="collapse">
                                        Log In
                                        <span class="step-options">
                                            <span class="ticket-status">Open</span>
                                            <i class="fa fa-chevron-down"></i>
                                        </span>
                                    </a>
                                </h4>
                            </div>

                            <div id="support-ticket-all-content-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="support-ticket-all-header-2">
                                <div class="panel-body">
                                    <div class="support-ticket-chat">
                                        <div>Customer Care Executive: <span class="support-executive">Uzma Shaikh</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="support-tickets-open">
                    <!-- display if there are no completed orders-->
                    <div id="completed-no-bookings"
                         class="container-fluid no-side-padding order-details-card card-elevation text-center empty-card-items">
                        <img src="img/sad.png" width="75"/>
                        <br/>
                        <br/>
                        <p class="font-18">You have not booked a service yet</p>
                        <button class="btn btn-tsz btn-raised btn-tszYellow">Book a service</button>
                    </div>
                    <!-- display if there are no completed orders end-->
                    <div id="completed-has-bookings"
                         class="container-fluid no-side-padding available-card-items">
                        <img src="img/placeholder.gif" width="100%"/>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="support-tickets-closed">
                    <!-- display if there are no cancelled orders-->
                    <div id="cancelled-no-bookings"
                         class="container-fluid no-side-padding order-details-card card-elevation text-center empty-card-items">
                        <img src="img/happy.png" width="75"/>
                        <br/>
                        <br/>
                        <p class="font-18">Yay! You have no cancelled services</p>
                        <button class="btn btn-tsz btn-raised btn-tszYellow">Refer Timesaverz</button>
                    </div>
                    <!-- display if there are no cancelled orders-->
                    <div id="cancelled-has-bookings"
                         class="container-fluid no-side-padding available-card-items">
                        <img src="img/placeholder.gif" width="100%"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php require_once("includes/footer.php"); ?>
<?php require_once("search-overlay.php"); ?>
<?php require_once("includes/raise-new-ticket-module.php"); ?>
<?php require_once("includes/footerInjector.php"); ?>
<script type="text/javascript" src="js/support-center.js?>"></script>
<script type="text/javascript" src="js/non-index-scripts.js"></script>
<script type="text/javascript" src="node_modules/fancybox/dist/js/jquery.fancybox.js"></script>
</body>
</html>
