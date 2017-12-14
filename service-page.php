<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 10-01-2017
 * Time: 13:04
 */
$pageCanonicalName = "service";
require("router.php");
$subCategoryIndex = 0;
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
<?php require_once("includes/header-servicepage.php"); ?>
<div class="container-fluid mainContent">
    <!--provide classname as 'backgroundOverlaycleaning' where cleaning is a supercatrgory name, for repirs it will be 'backgroundOverlayrepairs' -->
    <div class="row serviceSelection backgroundOverlay-<?php echo(strtolower($TSZsuperCategoryName));?>" style="background-image: url('img/serviceBackground.png')">
        <div class="container-fluid block-container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb font-weight-regular font-16">
                    <li><a href="/">Home</a></li>
                    <li><a href="category-listing.php">Library</a></li>
                    <li class="active">Data</li>
                </ul>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="timesaverzCategoryHeading">
                    <span class="timesaverzHeadingText">

                        <?php
                        echo($TSZgetInitArrayForService["data"]["categoryName"]); ?>
                        <span class="categoryRating"><?php echo($TSZgetInitArrayForService["data"]["super"]["ratings"]);?><small>/5</small></span>
                    </span>
                    <span class="heading-line"></span>
                    <span class="timesaverzHeadingText pull-right">
                        <small>
                            <span><i class="fa fa-users" aria-hidden="true"></i> <span><?php echo($TSZgetInitArrayForService["data"]["super"]["customers"]);?>+</span></span>
                            <span><i class="fa fa-hourglass-start "></i><span> <?php echo($TSZgetInitArrayForService["data"]["super"]["tat"]);?> Hours</span></span>
                            <span><i class="fa fa-suitcase "></i> <span><?php echo($TSZgetInitArrayForService["data"]["super"]["agents"]);?>+</span></span>
                        </small>
                    </span>
                </p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 serviceDetails">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 card-elevation">
                        <button class="btn btn-raised btn-tsz btn-tszYellow" id="rate-card-button" data-toggle="modal" data-target="#service-ratecard">&#8377; Rate Card</button>
                        <div class="serviceDetailsContainer" id="serviceDetails">
                            <?php if($TSZcategoryFlow=="normal" || $TSZcategoryFlow=="normal-singlecheckout"){
                                echo($TSZgetInitArrayForService["data"]["subcat"][0]["subcategoryDescription"]);
                            }else if($TSZcategoryFlow=="checkbox-dropdown" || $TSZcategoryFlow=="checkbox-dropdown-singlecheckout"){
                                echo($TSZgetInitArrayForService["data"]["categoryLongNote"]);
                            }else{

                            } ?>
                        </div>
                        <div class="serviceFooter">
                            <img src="img/offer_sticker.png" /> Pay online and avail a cashback of 5%
                        </div>
                    </div>
                </div>

                <?php
                if ($TSZcategoryFlow == "normal" || $TSZcategoryFlow=="normal-singlecheckout") {
                    require_once("includes/servicepage-normal.php");
                } else if ($TSZcategoryFlow == "checkbox-dropdown" || $TSZcategoryFlow=="checkbox-dropdown-singlecheckout"){
                    require_once("includes/servicepage-multidropdown.php");
                } else
                {
                    require_once("includes/servicepage-multiselection.php");
                }
                ?>
            </div>
        </div>
    </div>

    <!--Compare services-->
    <div class="container-fluid block-section" id="compareServices">
        <div class="block-container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="timesaverzHeading">
                    <span class="timesaverzHeadingText"><span>Compare </span>Services</span>
                    <span class="heading-line"></span>
                </p>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <select id="compareServiceOne" class="form-control wide">
                                <option value="basic">Basic</option>
                                <option value="deep">Deep</option>
                                <option value="move-in">Move-In</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <select id="compareServiceTwo" class="form-control wide">
                                <option value="basic">Basic</option>
                                <option value="deep">Deep</option>
                                <option value="move-in">Move-In</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <button id="compare-button" class="btn btn-raised btn-tsz btn-tszYellow" data-toggle="modal" data-target="#compare-services">Compare services</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Compare services end-->

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
</div>
<!--What people say about our service end-->

<!--People who used our service-->
<div class="container-fluid block-section" id="service-portfolio">
    <div class="block-container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p class="timesaverzHeading">
                <span class="timesaverzHeadingText">People who used Our <span> <?php echo($TSZgetInitArrayForService["data"]["super"]["supercategoryName"]); ?>
                        service</span>
                </span>
                <span class="heading-line"></span>
            </p>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="owl-carousel">
                        <img src="img/aboutService.png" class="card-elevation equalHeightInnerContainer">
                        <video controls class="equalHeightInnerContainer">
                            <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--People who used our service end-->

<!--About the Service-->
<div class="container-fluid block-section" id="superCategoryDesc">
    <div class="block-container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p class="timesaverzHeading">
                <span class="timesaverzHeadingText">About Our <span> <?php echo($TSZgetInitArrayForService["data"]["super"]["supercategoryName"]); ?>
                        service</span>
                </span>
                <span class="heading-line"></span>
            </p>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid card-elevation">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 superCategoryImage">
                            <img src="http://www.timesaverz.com/img/banner<?php echo($TSZgetInitArrayForService["data"]["super"]["supercategoryID"]); ?>.png"/>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 superCategoryDesc">
                            <p><?php echo($TSZgetInitArrayForService["data"]["super"]["supercategoryDescription"]); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--About the Service end-->

    <!--media and blog-->
    <!--pass a class name of the supercategory for the blog image label for supercategorywise background color -->
    <div class="row block-section" id="tszMediaBlog">
        <div class="block-container">
            <div class="col-md-12 col-sm-12 col-xs-12" id="tszBlog">
                <p class="timesaverzHeading">
                    <span class="timesaverzHeadingText">You may also want to <span>Read</span></span>
                    <span class="heading-line"></span>
                </p>
                <?php require_once("includes/blogModule.php") ?>
            </div>
        </div>
    </div>
    <!--media and blog end-->

</div>
<!--Testimonials end-->

<?php require_once("includes/footer.php"); ?>
<?php require_once("search-overlay.php"); ?>
<?php require_once("includes/compare-services-module.php"); ?>
<?php require_once("includes/ratecard-module.php"); ?>
<script type="text/javascript" src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/non-index-scripts.js"></script>
<?php require_once("includes/footerInjector.php");
if ($TSZcategoryFlow == "normal" || $TSZcategoryFlow=="normal-singlecheckout") {?>
    <script type="text/javascript" src="js/servicePage.js?ver=<?php echo($TSZversioncode);?>"></script>
<?php }else if($TSZcategoryFlow == "checkbox-dropdown-singlecheckout" || $TSZcategoryFlow == "checkbox-dropdown-singlecheckout"){?>
    <script type="text/javascript" src="js/servicePage-dropdown.js?ver=<?php echo($TSZversioncode);?>"></script>
<?php }else{ ?>
    <script type="text/javascript" src="js/servicePage-multiselect.js?ver=<?php echo($TSZversioncode);?>"></script>
<?php } ?>

</body>
</html>