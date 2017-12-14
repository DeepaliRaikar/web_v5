<div class="modal fade" id="searchOverlay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container-fluid block-section">
                <div class="block-container row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position: relative;">
                        <i class="material-icons font-30" id="backToHome" aria-hidden="true" data-dismiss="modal" aria-label="Close">keyboard_arrow_left</i>
<!--                        <i class="fa fa-close fa-2x" id="closeSearch" aria-hidden="true"></i>-->
                        <div class="searchServices">
                            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 tszSearch">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn searchCitySelect">
                                            <button type="button" class="btn btn-default dropdown-toggle btn-tsz btn-tszYellow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="searchSelectedCity">Mumbai</span> <span class="caret"></span></button>
                                            <ul class="dropdown-menu searchCitiesDropdown">
                                                <?php foreach ($TSZgetAllCitiesWeServiceIn["data"] as $servicableCity){?>
                                                    <li><a href="#<?php echo($servicableCity["cityID"]); ?>" class="cityNameFromList"><?php echo($servicableCity["cityName"]); ?></a></li>
                                                <?php }?>
                                            </ul>
                                        </div><!-- /btn-group -->
                                        <input type="search" id="aa-search-input" class="aa-input-search form-control" placeholder="SELECT FROM OVER 40+ SERVICES..." name="search" autocomplete="off" />
                                        <svg id="icon-search" class="aa-input-icon" viewBox="654 -372 1664 1664">
                                            <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                                        </svg>
                                        <svg class="aa-input-close" id="icon-close" viewBox="0 0 26 25">
                                            <polygon points="26.2,23 15.4,12.5 26.2,2 23.9,-0.4 13,10.2 2.1,-0.4 -0.2,2 10.6,12.5 -0.2,23 2.1,25.4 13,14.8     23.9,25.4" />
                                        </svg> <!-- Added SVG close icon -->

                                    </div><!-- /input-group -->
                                </div>
                                <div class="trendingServices">
                                    <ul class="white no-side-padding">
                                        <li><i class="fa fa-line-chart "></i>&nbsp; Trending Services:</li>
                                        <li><a href="">Sofa Cleaning,</a></li>
                                        <li><a href="">General Pest Control,</a></li>
                                        <li><a href="">Refrigerator Repairs</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.col-lg-6 -->
                        </div>
                    </div>
                </div>

                <!--Handpicked services-->
                <div class="block-container row block-section top-services" id="handpickedServices">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="timesaverzHeading">
                            <span class="timesaverzHeadingText"><span>Handpicked Services </span>For you</span>
                            <span class="heading-line"></span>
                        </p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="searchHandpickedServices">
                        <a href="#">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                                    <img src="img/placeholder.gif" width="100%" />
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                                    <img src="img/placeholder.gif" width="100%" />
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 serviceCard box-elevation">
                                    <img src="img/placeholder.gif" width="100%" />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--Handpicked Services end-->
                <br/>
                <br/>
                <!--All our services-->
                <div class="row block-section all-services" id="allServices">
                    <div class="block-container">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p class="timesaverzHeading">
                                <span class="timesaverzHeadingText">All Our<span> Services </span></span>
                                <span class="heading-line"></span>
                            </p>
                        </div>
                        <div class="row" id="searchAllServices">
                            <a href="#">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 serviceCategoryIcon">
                                        <img src="img/placeholder.gif" width="100%" />
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 serviceCategoryIcon">
                                        <img src="img/placeholder.gif" width="100%" />
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 serviceCategoryIcon">
                                        <img src="img/placeholder.gif" width="100%" />
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 serviceCategoryIcon">
                                        <img src="img/placeholder.gif" width="100%" />
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 serviceCategoryIcon">
                                        <img src="img/placeholder.gif" width="100%" />
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 serviceCategory">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 serviceCategoryIcon">
                                        <img src="img/placeholder.gif" width="100%" />
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--All our services end-->
</div>
<!-- Include AlgoliaSearch JS Client and autocomplete.js jQuery plugin after the jQuery dependency -->
<!--<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>
<!-- Initialize autocomplete menu -->
<script type="text/javascript" src="js/searchpage.js?ver=<?php echo($TSZversioncode);?>" ></script>