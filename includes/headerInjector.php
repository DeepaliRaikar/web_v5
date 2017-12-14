<?php
/**
 * Created by PhpStorm.
 * User: Deeps
 * Date: 10-01-2017
 * Time: 13:05
 */
?>
<meta name="google-site-verification" content="DsvbzxlR4HeTT_b6Wv6PmE4Vl0z4GQU2CoQF5u80e7M" />

<!--<base href="--><?php //echo(BASEURL);?><!--">-->
<link rel="stylesheet" type="text/csxs" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="node_modules/bootstrap-material-design/bower_components/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css" />
<!--<link rel="stylesheet" type="text/css" href="node_modules/bootstrap-material-design/dist/css/ripples.min.css" />-->
<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.min.css" />
<!--material icons-->
<link href="css/material-icons.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="css/marquee.css" />
<link rel="stylesheet" type="text/css" href="node_modules/jquery-nice-select/css/nice-select.css">
<link rel="stylesheet" type="text/css" href="css/custom_styles.css?<?php echo(date('hMgmi'));?>" />
<link rel="stylesheet" type="text/css" href="css/jquery.dropdown.css" />
<link rel="stylesheet" type="text/css" href="node_modules/owl.carousel/docs/assets/css/animate.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-material-datetimepicker.css" />
<link rel="stylesheet" type="text/css" href="css/snackbar.css" />
<link rel="stylesheet" type="text/css" href="css/search.css?<?php echo(date('hMgmi'));?>" />
<link rel="stylesheet" type="text/css" href="node_modules/easy-autocomplete/dist/easy-autocomplete.min.css" />
<script type="text/javascript" src="node_modules/bootstrap-material-design/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/jquery-slimscroll/jquery.slimscroll.min.js"></script>


<script type="text/javascript" data-pace-options='{ "ajax": true }' src="js/pace.js"></script>
<link rel="stylesheet" type  ="text/css" href="css/pace.css" />

<!-- GLOBAL JS VARIABLE SHOULD ALWAYS BE PUT HERE -->
<script type="application/javascript">
    //SET TIMEOUT FOR LOCALSTORAGE
    var removeLocalStorageDataTime = 86400;//86400 is 24 Hours
    var selectedCityID = <?php if(isset($TSZcityID)){echo($TSZcityID);}else{echo("1");}?>;
    var selectedCityName = '<?php if(isset($TSZcityName)){echo(ucfirst($TSZcityName));}else{echo("Mumbai");}?>';
    var selectedUserID = <?php if(isset($TSZuserID)){echo($TSZuserID);}else{echo("0");}?>;
    var selectedUserName = '<?php if(isset($TSZuserName)){echo($TSZuserName);}else{echo("Guest");}?>';
    var superCategoryID = <?php echo($TSZsuperCategoryID); ?>;
    var categoryID = <?php echo($TSZcategoryID); ?>;
    var superCategoryName = '<?php echo($TSZsuperCategoryName); ?>';
</script>

<!-- GLOBAL JS VARIABLE SHOULD END BEFORE THIS -->

