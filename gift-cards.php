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
        <title>Timesaverz - Gift Cards!</title>

        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid" id="gift-cards">
            <div class="block-container row block-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="timesaverzHeading">
                        <span class="timesaverzHeadingText"><span>Timesaverz Gift Card </span></span>
                        <span class="heading-line"></span>
                    </p>

                    <div class="panel panel-default gift-cards-desc">
                        <div class="panel-body">
                            <p class="font-weight-regular" id="subscription-package-desc">We all struggle to find the
                                perfect gift for our loved ones! Be it a birthday, anniversary or any other occasion,
                                buying a gift is always a task. At Timesaverz, we bring to you unique e-gift cards to
                                make the whole process of selecting and buying a gift much simpler. Timesaverz offers two
                                types of gifting solutions: Gift card loaded with denominations ranging from Rs. 10 to
                                Rs. 10,000 and gift card loaded with a home service. The gift card gets sent to your loved
                                ones via e-mail. Timesaverz gift card is the best way to buy e-cards online, whether you are
                                buying Rakhi gifts, Christmas gifts, Diwali gifts, Congratulations gifts, Anniversary gifts, 
                                Birthday gifts and it is also perfect for Corporate gifting.
                            </p>
                            <p class="font-weight-regular">
                                Timesaverz offers two types of gifting solutions: <b>Gift card loaded with denominations ranging
                                from Rs. 10 to Rs. 10,000</b> and <b>gift card loaded with a home service.</b>
                                The gift card gets sent to your loved ones vie e-mail.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-d-12 col-sm-12 col-xs-12 no-side-padding gift-card-details-wrapper">
                    <!--cart items displayed to the right end-->
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-right">
                        <?php
                            require_once("includes/gift-card-checkout-module.php");
                        ?>
                    </div>
                    <!--cart items displayed to the right-->
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 cart-items-right pull-left">
                        <div class="container-fluid gift-card-wrapper" id="gift-card">
                            <div class="container-fluid card-elevation" id="gift-card-image">
                                <div class="container-fluid no-side-padding text-center gift-card-logo">
                                    <img src="img/tsz_logo.png" />
                                </div>
                                <div class="container-fluid no-side-padding text-center vertical-padding">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-side-padding text-center">
                                        <img src="img/gift-card.png"/>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-side-padding gift-card-details">
                                        <img src="img/gift-card-title.png"/>
                                        <div>
                                            <div  id="gift-card-type-balance" class="font-weight-bold font-22">&#8377; <span id="gift-card-amount">0</span></div>
                                            <div id="gift-card-type-service" class="font-weight-bold font-22 tsz-hidden">Mobile Repairs</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="container-fluid block-container text-center gift-card-message-block">
                                <p id="gift-card-message" class="text-white font-24">Send a special message to a special someone...</p>
                                <p class="text-grey gift-card-salutation font-18">Regards,</p>
                                <p id="gift-card-name" class="text-yellow font-24">Your Name here</p>
                            </div>
                        </div>

                        <!--selected address displayed here -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation selected-address tsz-hidden" id="selected-address"></div>
                        <!--selected address displayed here end -->
                    </div>
                </div>
            </div> <!-- Block container.block section --->
        </div><!-- container fluid-->


        <?php require_once("includes/footer.php"); ?>

        <?php require_once("search-overlay.php"); ?>

        <script type="text/javascript" src="js/gift-cards.js"></script>

        <script type="text/javascript" src="js/non-index-scripts.js"></script>

        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>
