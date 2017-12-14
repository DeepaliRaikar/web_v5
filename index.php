<?php require("router.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Timesaverz</title>

        <?php require_once("includes/headerInjector.php"); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <!--Initiate WOW js, can be at the bottom of your file -->
        <script>
            wow = new WOW(
                {
                    boxClass:     'wow',      // default
                    animateClass: 'animated', // change this if you are not using animate.css
                    offset:       0,          // default
                    mobile:       true,       // keep it on mobile
                    live:         true        // track if element updates
                }
            )
            wow.init();
        </script>
    </head>
    <body>
        <?php require_once("includes/header.php"); ?>
        <div id="main-container">

            <!--banner area-->
            <div class="container-fluid no-side-padding" id="tszBanner">
                <div class="owl-carousel owl-theme">
                    <div>
                        <img src="img/homepageBanner.png"/>
                    </div>
                    <div>
                        <img src="img/homepageBanner.png" />
                    </div>
                    <div>
                        <img src="img/homepageBanner.png" />
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="searchServices">
                    <div class="text-center white">
                        <h1>LIVE BETTER</h1>
                        <h2>Get Trained Professionals For Your Home</h2>
                    </div>
                    <?php include("services-searchbar.php"); ?>
                </div>


            </div>
            <!--banner area end-->
            <!--how does timesaverz work-->
            <div class="container-fluid block-section" id="tszWork">
                <div class="block-container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="timesaverzHeading  wow slideInLeft">
                            <span class="timesaverzHeadingText">How Does <span>Timesaverz work?</span></span>
                            <span class="heading-line"></span>
                        </p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="col-md-4 col-sm-4 col-xs-12 tszWork">
                            <div class="steps wow slideInLeft">Step 1</div>
                            <div class="tszWorkImg wow slideInLeft"><img src="img/tsz-work/tsz-work-1.png"></div>
                            <div class="wow slideInRight"><h4>Book a Service</h4></div>
                            <div class="wow slideInRight"><p>From a wide range of home services</p></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 tszWork">
                            <div class="steps wow slideInLeft">Step 2</div>
                            <div class="tszWorkImg wow slideInLeft"><img src="img/tsz-work/tsz-work-2.png"></div>
                            <div class="wow slideInRight"><h4>Pay</h4></div>
                            <div class="wow slideInRight"><p>Before or after the service is done</p></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 tszWork">
                            <div class="steps wow slideInLeft">Step 3</div>
                            <div class="tszWorkImg wow slideInLeft"><img src="img/tsz-work/tsz-work-3.png"></div>
                            <div class="wow slideInRight"><h4>Relax</h4></div>
                            <div class="wow slideInRight"><p>While your home service gets done</p></div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <a href="" class="btn btn-tsz btn-raised btn-tszYellow wow slideInUp">Book a home service</a>
                    </div>
                    <div class="skewed-bg"></div>
                </div>
            </div>
            <!--how does timesaverz work end-->

            <!--Why timesaverz-->
            <div class="container-fluid block-section" id="tszDepend">
                <div class="block-container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="timesaverzHeading">
                            <span class="timesaverzHeadingText">Why <span>Depend on us?</span></span>
                            <span class="heading-line"></span>
                        </p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div><img src="img/tsz-whyus/whyus-1.png"></div>
                            <div><h4>One stop <br/>Destination</h4></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div><img src="img/tsz-whyus/whyus-2.png"></div>
                            <div><h4>Trusted <br/>Executives</h4></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div><img src="img/tsz-whyus/whyus-3.png"></div>
                            <div><h4>On Time <br/>quality Service</h4></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div><img src="img/tsz-whyus/whyus-4.png"></div>
                            <div><h4>Service <br/>Guarantee</h4></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div><img src="img/tsz-whyus/whyus-5.png"></div>
                            <div><h4>Money back <br/>Guarantee</h4></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                            <div><img src="img/tsz-whyus/whyus-6.png"></div>
                            <div><h4>Earn <br/>Minutes</h4></div>
                        </div>
                    </div>
                </div>
                <div class="skewed-bg"></div>
            </div>
            <!--Why timesaverz end-->

            <!--download app-->
            <div class="container-fluid block-section" id="tszDownload">
                <div class="block-container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-right wow slideInRight" id="tszDownloadDetails">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText">Download the <span>Timesaverz app Now.</span></span>
                            </p>
                            <p class="tszSubheading">And Book Home Services on the Go!</p>
                            <div id="appDownload">
                                <div>
                                    <img src="img/tsz-download/appstore.png"/>
                                    <img src="img/tsz-download/googleplay.png"/>
                                </div>
                                <div id="appDownloadButton">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <input id="appLinkMobileNumber" class="form-control" type="text" maxlength="10" placeholder="ENTER MOBILE NUMBER">
                                            <span class="input-group-btn">
                                                <button class="btn btn-tsz btn-raised btn-tszYellow" type="button">Send app link</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow slideInLeft" id="tszDownloadImg">
                            <img src="img/tsz-download/downloadApp.png"/>
                        </div>

                    </div>
                </div>
                <div class="skewed-bg"></div>
            </div>
            <!--download app end-->

            <!--media and blog-->
            <div class="container-fluid block-section" id="tszMediaBlog">
                <div class="block-container">

                    <div class="col-md-12 col-sm-12 col-xs-12 text-center" id="tszMedia">
                        <div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-12">
                            <img src="img/media1.png"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <img src="img/media2.png"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <img src="img/media3.png"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <img src="img/media4.png"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <img src="img/media5.png"/>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12" id="tszBlog">
                        <p class="timesaverzHeading">
                            <span class="timesaverzHeadingText">Our <span>Blog</span></span>
                            <span class="heading-line"></span>
                        </p>
                        <?php require_once("includes/blogModule.php") ?>
                    </div>
                </div>
                <div class="skewed-bg"></div>
            </div>
            <!--media and blog end-->

            <!--Timesaverz in mumbai-->
            <div class="container-fluid block-section" id="tszCity">
                <div class="block-container">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="tszCityDetails">
                        <p class="timesaverzHeading">
                            <span class="timesaverzHeadingText">Timesaverz in <span
                                    class="cityNameForArea">Mumbai</span></span>
                            <span class="heading-line"></span>
                        </p>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" id="tszCityImage">
                            <img src="img/inthecity/city.png"/>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" id="tszCityDescription">
                            <p>Mumbai has rightly been called the city of dreams. We understand that the fast paced city
                                life, busy schedules and long commutes often leave you with little time to actually pursue
                                your passion.</p>
                            <p>Relax, we at Timesaverz have a strong network of curated agents who provide services right at
                                your doorstep. So whether you are looking to get your house cleaned, your clothes
                                dry-cleaned or get pampered with a salon experience at home, all you need to do is download
                                our app and book a service. With our flexible time slots, on-time service guarantee and
                                quality assurance, you can be assured of getting tasks done at your convenience.</p>
                        </div>
                        <div class="area-marquee-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="area-marquee-container">
                                <div class="marquee-sibling">
                                    Areas we Service :
                                </div>
                                <div class="marquee">
                                    <ul class="marquee-content-items areas-scroller">
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                        <li>Item 4</li>
                                        <li>Item 5</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="skewed-bg"></div>
            </div>
            <!--Timesaverz in mumbai end-->

            <!--Testimonials-->
            <div class="container-fluid block-section" id="tszTestimonials">
                <div class="block-container">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="owl-carousel owl-theme home-testimonial-slider">
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
                                    <h3>Shubra Aaiyappa</h3></p>
                                    <p class="testimonialService">Booked Home Cleaning Service</p>
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
                                    <h3>Shubra Aaiyappa</h3></p>
                                    <p class="testimonialService">Booked Home Cleaning Service</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Testimonials end-->

        <?php require_once("includes/footer.php"); ?>
        <?php require_once("search-overlay.php"); ?>
        <script type="text/javascript" src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/index-scripts.js?ver=<?php echo($TSZversioncode);?>"></script>
        <?php require_once("includes/footerInjector.php"); ?>
    </body>
</html>
