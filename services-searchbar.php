<div id="content-anchor"></div>
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
                <input type="text" class="form-control" placeholder="SELECT FROM OVER 40+ SERVICES">

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