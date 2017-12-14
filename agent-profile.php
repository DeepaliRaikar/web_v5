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
    <title>Timesaverz - Agent Profile</title>

    <?php require_once("includes/headerInjector.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/lightgallery.css">

</head>
<body>
<?php require_once("includes/header.php"); ?>
<div class="container-fluid" id="agent-profile">
    <div class="block-container row block-section">
        <div class="card-elevation container-fluid" id="agent-info">
            <div id="profile-image" class="circle-profile">
                <img src="img/agent-profile.png" style="width: 100%;" />
            </div>
            <div id="agent-details">
                <div id="agent-name"><span class="font-weight-regular">Sanjay Patel</span> <span class="badge">4.5 <i class="material-icons">star</i></span></div>
                <div class="agent-rating">
                    <i class="material-icons text-yellow">star</i>
                    <i class="material-icons text-yellow">star</i>
                    <i class="material-icons text-yellow">star</i>
                    <i class="material-icons text-yellow">star_half</i>
                    <i class="material-icons">star_border</i>
                </div>
                <div class="agent-tagline"><i>"Make Homes shine since 2012"</i> <span class="badge text-white"><span id="jobs-done">200 </span>Jobs Done</span></div>
            </div>
        </div>

        <!-- <div class="card container-fluid" id="agent-portfolio"> -->

        <div class="panel panel-default"  id="agent-portfolio-content" >
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active column-2"><a href="#agent-portfolio" data-toggle="tab">Portfolio (<span id="portfolio-count">20</span>)</a></li>
                <li class="column-2"><a href="#agent-feedback" data-toggle="tab">Feedback</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="agent-portfolio">
                    <div style="display:none;" id="portfolio-video-1">
                        <video class="lg-video-object lg-html5" controls preload="none">
                            <source src="video/big_buck_bunny.mp4" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>

                    <ul id="portfolio-items" class="container-fluid">
                        <li class="col-md-3 col-sm-4 col-xs-6" data-html="#portfolio-video-1" >
                            <img src="http://sachinchoolur.github.io/lightGallery/static/img/videos/h-video3-poster.jpg" style="width: 100%" />
                        </li>
                        <li class=" col-md-3 col-sm-4 col-xs-6"  data-src="img/banner_background.png" >
                            <a href="">
                                <img class="img-responsive" src="img/banner_background.png">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="agent-feedback">
                    <div class="container-fluid">
                        <div class="text-center col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div>
                                <p class="left-quote">
                                    <img src="img/left-quote.png"/>
                                </p>
                                <p class="testimonial">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et
                                </p>
                                <p class="testimonee">
                                Shubra Aaiyappa</p>
                            </div>
                        </div>
                        <div class="text-center col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                                <div>
                                    <p class="left-quote">
                                        <img src="img/left-quote.png"/>
                                    </p>
                                    <p class="testimonial">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et
                                    </p>
                                    <p class="testimonee">
                                    Shubra Aaiyappa</p>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div> <!-- container fluid -->
<?php require_once("includes/footer.php"); ?>

<?php require_once("search-overlay.php"); ?>


<script type="text/javascript" src="js/non-index-scripts.js"></script>

<?php require_once("includes/footerInjector.php"); ?>
<script type="text/javascript" src="js/lightgallery-all.min.js"></script>
<script type="text/javascript" src="js/agent-profile.js"></script>
</body>
</html>

