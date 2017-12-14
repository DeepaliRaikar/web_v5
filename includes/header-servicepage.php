<?php
/**
 * Created by PhpStorm.
 */
?>

<style>
    .navbar-toggle{
        display: block !important;
    }
</style>
<header id="header" class="navbar-fixed-top">
    <div id="topmenu" class="hidden-xs">
        <div class="block-container">
            <ul class="container-fluid">
                <li><a href="gift-cards.php">Gift Cards</a></li>
                <li><a href="subscription-packages.php">Subscription Packages</a></li>
                <li><a href="offers.php">Offers</a></li>
            </ul>
            <ul class="pull-right container-fluid">
                <li><a href="dashboard.php">Minutes</a></li>
                <li><a href="cart.php">Orders</a></li>
                <li><a href="">Support</a></li>
                <li><a href="#"><i class="fa fa-phone"></i> +91-9022711888</a></li>
            </ul>
        </div>
    </div>
    <nav>
        <div class="block-container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header pull-left">
<!--                <button type="button" id="navbar-hamburger-servicepage" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="javascript: toggleSidebar();">-->
<!--                    <span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
                <a class="navbar-brand" href="#"><img src="img/tsz_footer_logo.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
<!--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--                <ul class="nav navbar-nav navbar-right">-->
<!--                    <li>-->
<!--                        <a href="dashboard.php" id="indexPageUserName">--><?php //echo("Hi, ".$TSZuserName);?><!--</a>-->
<!--                    </li>-->
<!--                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> 0</a></li>-->
<!--                </ul>-->
<!--            </div>-->
            <!-- /.navbar-collapse -->
            <button type="button" id="navbar-hamburger-servicepage" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="javascript: toggleSidebar();">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <!--                    <span class="icon-bar"></span>-->
            </button>
            <div id="side-menu" class="side-menu-hidden">
                <span id="close-sidemenu" onclick="javascript: toggleSidebar();"><i class="material-icons">close</i></span>
                <ul>
                    <li><a href="#">Option 1</a> </li>
                    <li><a href="#">Option 2</a> </li>
                    <li><a href="#">Option 3</a> </li>
                    <li><a href="#">Option 4</a> </li>
                    <li><a href="#">Option 5</a> </li>
                    <li><a href="#">Option 6</a> </li>
                </ul>
            </div>
        </div>
    </nav>
</header><!-- /.container-fluid -->
<!--topmenu end-->

