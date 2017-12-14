<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 24-01-2017
 * Time: 12:23
 */
require("router.php");
//if($TSZuserID<=0) {
//    header('Location: login.php?routeback=dashboard');
//}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
        <meta charset="UTF-8">
        <title>Dashboard - Timesaverz</title>
        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="node_modules/bootstrap-vertical-tabs/bootstrap.vertical-tabs.min.css"/>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid no-side-padding" id="dashboard">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-side-padding sidebar-options-hidden" id="sidebar"> <!-- required for floating -->
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
                        <!--<div class="container-fluid no-side-padding">
                            <p class="text-grey font-12 no-margin">More 23 points to redeem next gift</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%;"></div>
                            </div>
                        </div>-->
                    </li>
                    <li class="active"><a href="#home" data-toggle="tab">My Bookings</a></li>
                    <li><a href="#profile" data-toggle="tab">My Info</a></li>
                    <li><a href="#minutes" data-toggle="tab">Redeem Minutes</a></li>
                    <li><a href="#referrals" data-toggle="tab">Referrals</a></li>
                    <li><a href="#saved-address" data-toggle="tab">Saved Addresses</a></li>
                </ul>
<!--                <span class="profile-handler hidden-lg-hidden-md hidden-sm visible-xs" onclick="javascript: toggleDashboardSidebar();"><i class="material-icons">chevron_right</i></span>-->
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" id="dashboard-right-content">
                <div class="container-fluid block-container">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane inner-tab-pane active" id="home">

                            <!--my bookings tab-->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs box-elevation  text-center" role="tablist">

                                <li role="presentation" class="active column-3"><a href="#assigned" aria-controls="assigned"
                                                                                   role="tab" data-toggle="tab">Scheduled
                                        Orders</a></li>
                                <li role="presentation" class="column-3"><a href="#completed" aria-controls="completed"
                                                                            role="tab" data-toggle="tab">Completed
                                        Orders</a></li>
                                <li role="presentation" class="column-3"><a href="#cancelled" aria-controls="cancelled"
                                                                            role="tab" data-toggle="tab">Cancelled
                                        Orders</a></li>

                            </ul>

                        <!-- Tab panes -->
                        <div class="tab-content inner-tab-content">
                            <div role="tabpanel" class="tab-pane  active" id="assigned">
                                <!-- display if there are no assigned orders-->
                                <div id="scheduled-no-bookings"
                                     class="container-fluid no-side-padding order-details-card card-elevation text-center empty-card-items">
                                    <img src="img/sad.png" width="75"/>
                                    <br/>
                                    <br/>
                                    <p class="font-18">You have not booked a service yet</p>
                                    <button class="btn btn-tsz btn-raised btn-tszYellow">Book a service</button>
                                </div>
                                <!-- display if there are no assigned orders end-->

                                    <div id="scheduled-has-bookings"
                                         class="container-fluid no-side-padding available-card-items">
                                        <img src="img/placeholder.gif" width="100%"/>
                                    </div>
                                </div>


                                <div role="tabpanel" class="tab-pane" id="completed">
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
                                <div role="tabpanel" class="tab-pane" id="cancelled">
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
                            <!--my bookings tab end-->
                        </div>

                        <div class="tab-pane" id="profile">
                            <div class="container-fluid card-elevation profile-card  block-section">
                                <div class="row block-container">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label>Full Name</label>
                                            <input class="form-control" name="customerFullName" id="customerFullName"
                                                   type="text" placeholder="Full Name"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label>E-mail Address</label>
                                            <input class="form-control" name="customerEmail" type="email" id="customerEmail"
                                                   placeholder="E-mail Address"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row block-container">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label>Mobile Number</label>
                                            <input class="form-control" name="customerMobileNumber"
                                                   id="customerMobileNumber" type="number" placeholder="Mobile Number"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label>Gender</label>
                                            <select id="customerGender" name="customerGender" class="form-control wide">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row block-container">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label>Date of Birth</label>
                                            <input type="text" id="date-of-birth" class="form-control date no-margin"
                                                   placeholder="Date of Birth">
                                            <p class="help-block text-yellow font-weight-bold" id="dashboard-blank-birthday">Update Birthday and earn 20
                                                minutes!</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label>Date of Anniversary</label>
                                            <input type="text" id="date-of-anniversary" class="form-control date no-margin"
                                                   placeholder="Date of Anniversary">
                                            <p class="help-block text-yellow font-weight-bold" id="dashboard-blank-anniversay">Update Anniversary and earn
                                                20 minutes!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row block-container text-center">
                                    <br/>
                                    <button class="btn btn-tsz btn-raised btn-tszYellow" id="updateProfileButton">Update
                                        Profile
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="minutes">
                            <div class="container-fluid card-elevation minutes-card">
                                <div class="block-container">
                                    <div
                                        class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding redeem-minutes-info">
                                        <span class="minutes-earned font-30 text-yellow font-weight-bold"><span class="dashboard-user-minutes"></span> Minutes</span>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 60%;"></div>
                                        </div>
                                        <p class="text-grey">More 23 points to redeem next gift</p>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding">
                                        <p class="text-blue">
                                            Earn Minutes is Timesaverz's all new rewards program! Here's how it works:
                                            Activate your Earn Minutes
                                            profile and simply start earning minutes with every engagement you hve with us,
                                            it's as simple as that.
                                            The best part? These minutes can be redeemed for theor euivalent value in INR
                                            while booking a service
                                            on our platform, sso you get to step into an entire new world of convinience
                                            with some perks along the way!
                                        </p>
                                    </div>
                                    <!--Minutes tab-->
                                </div>
                            </div>

                            <div class="container-fluid no-side-padding">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs text-center box-elevation" role="tablist">
                                    <li role="presentation" class="active column-2"><a href="#minutes-timeline"
                                                                                aria-controls="minutes-timeline" role="tab"
                                                                                data-toggle="tab" class="font-weight-bold">Timeline</a>
                                    </li>
                                    <li role="presentation" class="column-2"><a href="#how-to-earn-guide"
                                                                                       aria-controls="how-to-earn-guide"
                                                                                       role="tab" data-toggle="tab"
                                                                                       class="font-weight-bold">How To
                                            Earn</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content inner-tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="minutes-timeline">
                                        <div id="no-minutes"
                                             class="container-fluid no-side-padding order-details-card card-elevation text-center empty-card-items">
                                            <img src="img/sad.png" width="75"/>
                                            <br/>
                                            <br/>
                                            <p class="font-18">Sad! You have no addresses</p>
                                            <!--<button class="btn btn-tsz btn-raised btn-tszYellow">Refer Timesaverz</button>-->
                                        </div>
                                        <!-- display if there are no saved address -->

                                        <!-- display if there are no assigned orders-->
                                        <div class="container-fluid no-side-padding card-elevation">
                                            <div id="has-minutes"
                                                 class="minutes-timeline block-container container-fluid no-side-padding">
                                                <img src="img/placeholder.gif" width="100%"/>
                                            </div>
                                        </div>
                                        <!-- display if there are no assigned orders end-->
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="how-to-earn-guide">
                                        <div class="container-fluid no-side-padding card-elevation">
                                            <div class="list-group block-container" id="how-to-earn-minutes">


                                                <div class="list-group-item">
                                                    <div class="row-picture">
                                                        <div class="minutes-earn-status checked text-center">
                                                            <span class="material-icons status-checked">done</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-content">
                                                        <div class="action-secondary"><span class="font-22">150</span> <span
                                                                class="font-13">Minutes</span></div>
                                                        <p class="font-16 no-margin">Tile with an icon</p>
                                                        <p class="no-margin font-14 text-grey font-weight-regular">Donec id
                                                            elit non mi porta gravida at eget metus.</p>
                                                    </div>
                                                </div>
                                                <div class="list-group-separator"></div>


                                                <div class="list-group-item">
                                                    <div class="row-picture">
                                                        <div class="minutes-earn-status checked text-center">
                                                            <span class="material-icons status-checked">done</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-content">
                                                        <div class="action-secondary"><span class="font-22">150</span> <span
                                                                class="font-13">Minutes</span></div>
                                                        <p class="font-16 no-margin">Tile with an icon</p>
                                                        <p class="no-margin font-14 text-grey font-weight-regular">Donec id
                                                            elit non mi porta gravida at eget metus.</p>
                                                    </div>
                                                </div>
                                                <div class="list-group-separator"></div>
                                                <div class="list-group-item">
                                                    <div class="row-picture">
                                                        <div class="minutes-earn-status text-center">
                                                            <span class="material-icons status-checked">done</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-content">
                                                        <div class="action-secondary"><span class="font-22">150</span> <span
                                                                class="font-13">Minutes</span></div>
                                                        <p class="font-16 no-margin">Tile with an icon</p>
                                                        <p class="no-margin font-14 text-grey font-weight-regular">Donec id
                                                            elit non mi porta gravida at eget metus.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Minutes tab end-->
                            </div>
                        </div>

                        <div class="tab-pane" id="referrals">
                            <div class="container-fluid card-elevation referral-card block-section">
                                <p class="referral-code font-24 text-yellow font-weight-bold text-center dashboard-user-referralcode">
                                    neha65</p>
                                <span class="referral-text">
                                    <p class="text-blue text-center font-weight-bold" id="referral-header">
                                        Double Happiness Offer
                                    </p>
                                    <p class="text-blue">
                                        Referring a friend has never been so rewarding. You and your frienf, both get FLAT Rs. 100 off* on each booking,
                                        no questions asked. You may also share your referral code with your friends.
                                    </p>
                                    <p class="text-grey no-margin">* Rs. <span id="friend-referral-bonus">100 </span>credited to your friends account immediately.</p>
                                    <p class="text-grey">* Rs. <span id="referral-bonus-earned">100</span> to your account once the friend has completed the service successfully.</p>
                                    <p class="text-blue text-center font-weight-bold" id="referral-header">
                                        Friends Reffered: <span id="friendsReferred">1</span>
                                    </p>
                                </span>
                                <p class="text-center social-sharing">
                                    <a href="#"><img src="img/social-twitter.png" width="50"></a>
                                    <a href="#"><img src="img/social-gplus.png" width="50"></a>
                                    <a href="#"><img src="img/social-facebook.png" width="50"></a>
                                    <a href="#"><img src="img/social-linkedin.png" width="50"></a>
                                    <a href="#"><img src="img/social-mail.png" width="50"></a>
                                </p>
                            </div>
                        </div>

                        <div class="tab-pane" id="saved-address">
                            <!-- display if there are no saved address -->
                            <div id="no-addresses"
                                 class="container-fluid no-side-padding order-details-card card-elevation text-center empty-card-items">
                                <img src="img/sad.png" width="75"/>
                                <br/>
                                <br/>
                                <p class="font-18">Sad! You have no addresses</p>
                                <!--<button class="btn btn-tsz btn-raised btn-tszYellow">Refer Timesaverz</button>-->
                            </div>
                            <!-- display if there are no saved address -->

                            <div id="has-addresses">
                                <!--saved address card-->
                                <div class="container-fluid card-elevation saved-address-card text-center">
                                    <img src="img/placeholder.gif" width="100%"/>
                                </div>
                                <!--saved address card end-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/dashboard.js?ver=<?php echo($TSZversioncode);?>"></script>

        <script type="text/javascript" src="js/non-index-scripts.js"></script>

        <?php require_once("includes/footer.php"); ?>
        <?php require_once("search-overlay.php"); ?>
        <?php require_once("includes/edit-address-module.php"); ?>
        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>
