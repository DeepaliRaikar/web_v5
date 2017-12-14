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
        <div class="navbar-header">
            <button type="button" id="navbar-hamburger" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tsz-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="img/tsz_footer_logo.png"></a>
            <a href="cart.php" class="hidden-md hidden-lg hidden-sm visible-xs" id="cart-icon-responsive"><i class="fa fa-shopping-cart"></i> <span class="cart-item-count">0</span></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="tsz-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="dashboard.php" id="indexPageUserName"><?php echo("Hi, ".$TSZuserName);?></a>
                </li>
                <li class="hidden-xs" id="cart-items"><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span id="cart-item-count">0</span></a></li>
<!--                add class has-cart-items to #cart-items if item count is more dan 0 else remove class has-cart-items-->

                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="gift-cards.php">Gift Cards</a></li>
                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="subscription-packages.php">Subscription Packages</a></li>
                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="offers.php">Offers</a></li>
                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="dashboard.php">Minutes</a></li>
                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="cart.php">Orders</a></li>
                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="">Support</a></li>
                <li class="hidden-md hidden-lg hidden-sm visible-xs"><a href="#"><i class="fa fa-phone"></i> +91-9022711888</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</header><!-- /.container-fluid -->
<!--topmenu end-->
