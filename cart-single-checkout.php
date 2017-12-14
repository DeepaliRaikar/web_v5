<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 17-01-2017
 * Time: 11:35
 */
require("router.php");
$pageCanonicalName = "cart";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Timesaverz - Cart</title>
    <?php require_once("includes/headerInjector.php"); ?>
    <script type="application/javascript">
        var redirectBackPage = '<?php echo($pageCanonicalName);?>';
    </script>
</head>
<body>
<?php require_once("includes/header-servicepage.php"); ?>
<div class="container-fluid">
    <div class="block-container row block-section">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="timesaverzHeading">
                <span class="timesaverzHeadingText">Your <span>Cart </span></span>
                <span class="heading-line"></span>
            </p>
        </div>

        <div class="col-lg-12 col-d-12 col-sm-12 col-xs-12">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <?php
                require_once("includes/cart-single-checkout-module.php");
                ?>
            </div>
            <!--cart items displayed to the right-->
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 cart-items-right">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation cartListItemsFinal">

                    <!--list group for items in the cart-->
                    <div class="list-group">
                        <div id="cartListItemsFinal">
                            <div class="list-group-item">
                                <div class="row-picture">
                                    <img src="img/serviceicon.png" alt="icon">
                                </div>
                                <div class="row-content">
                                    <h5 class="font-15 service-booked"><b>Home Cleaning: Basic 3bhk</b></h5>
                                    <p class="list-group-item-text bookedServiceSchedule font-14">18 Dec 2016, 10am -
                                        1am </p>

                                </div>
                                <span class="remove-item"><i class="material-icons">clear</i></span>
                            </div>
                            <div class="list-group-separator"></div>
                            <div class="list-group-item">
                                <div class="row-picture">
                                    <img src="img/serviceicon.png" alt="icon">
                                </div>
                                <div class="row-content">
                                    <h5 class="font-15 service-booked"><b>Home Cleaning: Basic 3bhk</b></h5>
                                    <p class="list-group-item-text bookedServiceSchedule font-14">18 Dec 2016, 10am -
                                        1am </p>
                                </div>
                                <span class="remove-item"><i class="material-icons">clear</i></span>
                            </div>
                            <div class="list-group-separator"></div>
                        </div>

                    </div>
                    <!--list group for items in cart end-->
                </div>

                <!--selected address displayed here -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-elevation selected-address tsz-hidden"
                     id="selected-address">
                    <div class="container-fluid card-elevation saved-address-card text-center">
                        <img src="img/placeholder.gif" width="100%"/>
                    </div>
                </div>
                <!--selected address displayed here end -->
            </div>

            <!--cart items displayed to the right end-->
        </div>
    </div> <!-- Block container.block section --->
</div><!-- container fluid-->


<?php require_once("includes/footer.php"); ?>

<?php require_once("search-overlay.php"); ?>

<script type="text/javascript" src="js/cart.js?ver=<?php echo($TSZversioncode); ?>"></script>

<script type="text/javascript" src="js/login.js?ver=<?php echo($TSZversioncode); ?>"></script>

<script type="text/javascript" src="js/non-index-scripts.js"></script>

<?php require_once("includes/footerInjector.php"); ?>
</body>
</html>


