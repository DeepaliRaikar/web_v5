
<?php
/**
 * Created by PhpStorm.
 */
$pageCanonicalName="categorylisting";
require_once("router.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Timesaverz - Categories</title>
    <?php require_once("includes/headerInjector.php"); ?>
</head>
<body>
<?php require_once("includes/header.php"); ?>
<div class="container-fluid main-container" id="category-listing">
    <!--Handpicked services-->
    <div class="row backgroundOverlay-<?php echo(strtolower($TSZsuperCategoryName));?>" id="top-services"
         style="background-image: url('img/serviceBackground.png')">
        <div class="container-fluid no-side-padding block-container block-section">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="timesaverzCategoryHeading">
                    <span class="timesaverzHeadingText">
                        <span class="timesaverzHeadingText"><span>Top Services in </span>Cleaning</span>
                        <span class="heading-line"></span>
                    </span>
                </p>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-side-padding top-services" id="topServices">
                <?php
                   $catslooper=0;
                $catscountclass= "";
                if(count($TSZgetInitArrayForCategory["data"]["categories"])<3){
                    //$catscountclass= "tsz-hidden";
                }
                foreach($TSZgetInitArrayForCategory["data"]["categories"] as $cats){
                    if($catslooper<3){?>
                        <a href="<?php echo(strtolower($TSZcityName).'/'.strtolower($TSZsuperCategoryName).'/'.strtolower($cats["categoryNameUrl"])); ?>">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-3 serviceCardIcon">
                                        <img src="http://cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/<?php echo($cats["categoryIcon"]);?>.png" />
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-9">
                                        <div class="serviceCardName"><?php echo($cats["categoryName"]);?></div>
                                        <p class="serviceCardDesc"><?php echo($cats["subcats"]);?></p>
                                        <div class="serviceCardPrice text-yellow">&#8377; <?php echo($cats["rate"]);?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php $catslooper++;
                    }
                }?>





<!--
                <a href="#">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <img sr0c="img/placeholder.gif" width="100%"/>
                    </div>
                </a>

                <a href="#">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <img src="img/placeholder.gif" width="100%"/>
                    </div>
                </a>

                <a href="#">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <img src="img/placeholder.gif" width="100%"/>
                    </div>
                </a>-->

            </div>
        </div>
        <!--Handpicked Services end-->

        <!--All our services-->
        <div class="row all-services <?php echo($catscountclass);?>" id="more-services">
            <div class=" block-section block-container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="timesaverzHeading">
                        <span class="timesaverzHeadingText"><span> Other </span>Services</span>
                        <span class="heading-line"></span>
                    </p>
                </div>
                <div class="container-fluid" id="otherServices">
                    <?php
                    /*if(count($TSZgetInitArrayForCategory["data"]["categories"])>2) {*/
                        $catslooper = 0;
                        foreach ($TSZgetInitArrayForCategory["data"]["categories"] as $categories) {
                            if ($catslooper > 2) {
                                ?>
                                <a href="<?php echo(strtolower($TSZcityName) . '/' . strtolower($TSZsuperCategoryName) . '/' . strtolower($categories["categoryNameUrl"])); ?>">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">
                                            <img
                                                src="http://cdn-timesaverz.s3.amazonaws.com/documents/assets/icons/v5/<?php echo($categories["categoryIcon"]); ?>.png"/>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">
                                            <div class="categoryName"><?php echo($categories["categoryName"]); ?></div>
                                            <p class="categoryDesc"><?php echo($categories["subcats"]); ?></p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                            $catslooper++;
                        /*}*/
                    }?>

                   <!--




                    <a href="">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">
                                <img src="img/serviceicon.png"/>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">
                                <div class="categoryName">Home Cleaning</div>
                                <p class="categoryDesc">Car, Carpet, Fridg, Home, Kitchen, Mattress, Sofa, Washroom,
                                    Window</p>

                            </div>
                    </a>

                    <a href="#">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">
                                <img src="img/serviceicon.png"/>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">
                                <div class="categoryName">Home Cleaning</div>
                                <p class="categoryDesc">Car, Carpet, Fridg, Home, Kitchen, Mattress, Sofa, Washroom,
                                    Window</p>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">
                                <img src="img/serviceicon.png"/>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">
                                <div class="categoryName">Home Cleaning</div>
                                <p class="categoryDesc">Car, Carpet, Fridg, Home, Kitchen, Mattress, Sofa, Washroom,
                                    Window</p>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 serviceCategoryIcon">
                                <img src="img/serviceicon.png"/>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 serviceCategoryDesc">
                                <div class="categoryName">Home Cleaning</div>
                                <p class="categoryDesc">Car, Carpet, Fridg, Home, Kitchen, Mattress, Sofa, Washroom,
                                    Window</p>
                            </div>
                        </div>
                    </a>-->


                </div>
            </div>
        </div>

    </div>
    <?php require_once("includes/footer.php"); ?>
    <?php require_once("search-overlay.php"); ?>
    <script type="text/javascript" src="js/category-listing.js?ver=<?php echo($TSZversioncode); ?>"></script>
    <script type="text/javascript" src="js/non-index-scripts.js?ver=<?php echo($TSZversioncode); ?>"></script>
    <?php require_once("includes/footerInjector.php"); ?>
</body>
</html>
