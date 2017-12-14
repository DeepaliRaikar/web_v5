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
        <title>Timesaverz - Contact Us</title>
        <?php require_once("includes/headerInjector.php"); ?>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div class="container-fluid" id="contact-us">
            <div class="block-container row block-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="container-fluid">
                        <div class="row">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText"><span>Contact Us</span></span>
                                <span class="heading-line"></span>
                            </p>
                            <p>The core of our company are <b>you</b>, our customers. We're always a click, call, knock and an email away from you. We're here to take your suggestions, appreciations, feedback as well as complaints. You can write to us <a href="/support-center">through our support center</a> or at <a href="mailto:contact@timesaverz.com">contact@timesaverz.com</a></p>

                        </div>
                        <div class="row">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText"><span>Email Us</span></span>
                                <span class="heading-line"></span>
                            </p>
                            <p>For service related queries, you can <a href="/support-center">raise a ticket through our support center</a> or send us an email at <a href="mailto:customercare@timesaverz.com">customercare@timesaverz.com</a>. You can write to us for anything and everything.</p>
                        </div>

                        <div class="row">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText"><span>Reach Us</span></span>
                                <span class="heading-line"></span>
                            </p>
                            <p>714-719, Corporate Avenue, Sonawala Road, Goregaon East, Mumbai, Maharashtra 400063</p><br/>
                            <div class="map">
                                <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:400px;width:100%;"><div id="gmap_canvas" style="height:400px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(19.160676,72.85086760000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(19.160676, 72.85086760000002)});infowindow = new google.maps.InfoWindow({content:"<b>Timesaverz Dotcom</b><br/>313, Corporate Avenue, Sonawala Road, Goregaon East<br/>400063 Mumbai" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- block container -->
        </div> <!-- container fluid -->
        <?php require_once("includes/footer.php"); ?>

        <?php require_once("search-overlay.php"); ?>


        <script type="text/javascript" src="js/non-index-scripts.js"></script>

        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>

