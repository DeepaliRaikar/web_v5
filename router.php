<?php
/**
 * Created by PhpStorm.
 * User: anuragshukla
 * Date: 19/01/17
 * Time: 1:26 PM
 */
session_start();
require("config.php"); //GET BASE VALUES
/********* INIT THE KEYS BELOW **************/

$TSZENVIRONMENT = "local";
$TSZuserName = "Guest";
$TSZuserID = 0;
$TSZcityID = 1;
$TSZcityName = 'Mumbai';
$TSZcategoryID = 1;
$TSZsuperCategoryID = 1;
$TSZsuperCategoryName = 'Cleaning';
$TSZsubCategoryID = 1;
$TSZvariableID = null;
$TSZPath = $_SERVER["REQUEST_URI"]; // Trim leading slash(es)
$TSZelements = explode("/", $TSZPath); // Get number of parameters in the rewritten URL
$TSZfileName = basename($_SERVER['PHP_SELF']);


/******** INIT ENDS HERE *******************/


function callTheRouteHelperAndSetValues($getvars,$type){
    $routerHelperURI = ENDPOINT."services/home/routehelper?params=".$getvars."&type=".$type;
    $getResponseFromRouter = callTheServiceHereForRouter($routerHelperURI);

    if($getResponseFromRouter==null||!isset($getResponseFromRouter)||empty($getResponseFromRouter)){
        header("Location: ".BASEURL."503");
    }
    return $getResponseFromRouter;
}
function createCookies($cookiename,$cookievalue){
    setcookie($cookiename,$cookievalue, time() + (86400 * 30), "/");
}
function callTheServiceHereForRouter($url){
    $username = TSZBASICAPIUSERNAME;
    $password = TSZBASICAPIPASSWORD;
    $context = stream_context_create(array (
        'http' => array (
            'header' => 'Authorization: Basic ' . base64_encode("$username:$password")
        )
    ));
    $outputdata = json_decode(file_get_contents($url, false, $context),TRUE);
    return $outputdata;
}


//ROUTING CODE GOES HERE
if(isset($_GET["city"])){
    $allParams = implode("|",$_GET);
    $getArrayFromRouter =  callTheRouteHelperAndSetValues($allParams,"city");
    if($getArrayFromRouter["status"]){
        $TSZcityID = $getArrayFromRouter["data"]["cityID"];
        $TSZcityName = $getArrayFromRouter["data"]["cityName"];
        $TSZcategoryID = $getArrayFromRouter["data"]["categoryID"];
        $TSZcategoryFlow = $getArrayFromRouter["data"]["categoryTemplate"];
        $TSZsuperCategoryID = $getArrayFromRouter["data"]["superCategoryID"];
        $TSZsuperCategoryName = $getArrayFromRouter["data"]["superCategoryName"];
        $TSZsubCategoryID = $getArrayFromRouter["data"]["subCategoryID"];
        $TSZvariableID = $getArrayFromRouter["data"]["variableID"];
        createCookies("selectedCityID",$TSZcityID);
        createCookies("selectedCityName",$TSZcityName);

    }else{
        var_dump($getArrayFromRouter);
        die();//Put 404 Here
        header("Location: ".BASEURL."");

    }
}

/*if(checkIfExistsTheKeyInUrl("city","about-us")){
    header('Location: about-us');
}
/*if(checkIfExistsTheKeyInUrl("city","careers")){
    header('Location: careers');
}*


//ROUTING CODE ENDS HERE
/**
 * Randomize The Includes
 */
$TSZversioncode = rand(111111,99999999);

/**
 * Randomize The Includes Ends
 */


if ($TSZENVIRONMENT=="staging"){

}elseif ($TSZENVIRONMENT=="staging"){

}else{
    //if($elements)
}

$TSZgetAllCitiesWeServiceIn = array();

$TSZgetInitArrayForCategory = array();
if(isset($pageCanonicalName) && $pageCanonicalName=="categorylisting"){
    $TSZgetInitArrayForCategory = callTheServiceHereForRouter(ENDPOINT."services/home/categorydetails?superCategoryID=".$TSZsuperCategoryID."&cityID=".$TSZcityID);
}

$TSZgetInitArrayForService = array();
if(isset($pageCanonicalName) && $pageCanonicalName=="service"){
    if($TSZcategoryFlow=="normal" || $TSZcategoryFlow=="normal-singlecheckout"){
        $TSZgetInitArrayForService = callTheServiceHereForRouter(ENDPOINT."services/home/servicedetails?categoryID=".$TSZcategoryID);
    }else if($TSZcategoryFlow=="checkbox-dropdown" || $TSZcategoryFlow=="checkbox-dropdown-singlecheckout"){
        $TSZgetInitArrayForService = callTheServiceHereForRouter(ENDPOINT."services/flows/dropdown?categoryID=".$TSZcategoryID);
    }

}

if(isset($_SESSION["citiesAreThere"]) && $_SESSION["citiesAreThere"]){
    $TSZgetAllCitiesWeServiceIn = $_SESSION["citiesJSONArray"];
}else{
    $TSZgetAllCitiesWeServiceIn =  callTheServiceHereForRouter(ENDPOINT."services/addresses/cities");
    $_SESSION["citiesAreThere"] = true;
    $_SESSION["citiesJSONArray"] = $TSZgetAllCitiesWeServiceIn;
}

if(!isset($_COOKIE["selectedUserName"])) {
    $TSZuserName = "Guest";
} else {
    $TSZuserName = $_COOKIE["selectedUserName"];
}

if(!isset($_COOKIE["selectedUserID"])) {
    $TSZuserID = 0;
} else {
    $TSZuserID = $_COOKIE["selectedUserID"];
}

if(!isset($_COOKIE["selectedCityName"])) {
    $TSZcityName = "Mumbai";
} else {
    $TSZcityName = $_COOKIE["selectedCityName"];
}

if(!isset($_COOKIE["selectedCityID"])) {
    $TSZcityID = 1;
} else {
    $TSZcityID = $_COOKIE["selectedCityID"];
}


/** Wrapper Verification and Security Check Is Here */
/** Do not change any code between these lines */
$_SESSION["selectedUserID"] = $TSZuserID;

/** Wrapper Verification and Security Check Ends Here */