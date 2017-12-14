<?php
/**
 * Created by PhpStorm.
 * User: anuragshukla
 * Date: 11/01/17
 * Time: 1:14 PM
 */
require ("../../config.php");
session_start();
//GET DATA FROM THE AJAX CALL TO POPULATE DATA
$isSessionSecure = false;
$urlFromCall = $_POST["url"];
$methodFromCall = strtoupper($_POST["method"]);
$paramsFromCall = $_POST["params"];
$DATA_FROM_SERVICE = array();



parse_str($paramsFromCall, $outputOfParams);
if (array_key_exists("userID", $outputOfParams)) {
    if ($outputOfParams["userID"] == $_SESSION["selectedUserID"]) {
        $isSessionSecure = true;
    }
} else {
    $isSessionSecure = true;
}

if (isset($_POST) && $isSessionSecure) {
    if (isset($_POST["url"]) && isset($_POST["method"])) {
        //Based on IP Change the Environment
        /*$ip_based_env_variable = "local";
        $BASE_API_URL = "http://192.168.1.150/timesaverz/api/";
        $PRODUCTION_IP_ARRAY = array("54.178.212.182", "172.31.21.231");
        $DEV_IP_ARRAY = array("52.69.49.40", "172.31.12.12");
        if (in_array($_SERVER['REMOTE_ADDR'], $PRODUCTION_IP_ARRAY) || in_array($_SERVER['SERVER_ADDR'], $PRODUCTION_IP_ARRAY) || in_array($_SERVER['HTTP_HOST'], $PRODUCTION_IP_ARRAY)) {
            $ip_based_env_variable = "production";
        } else if (in_array($_SERVER['REMOTE_ADDR'], $DEV_IP_ARRAY) || in_array($_SERVER['SERVER_ADDR'], $DEV_IP_ARRAY) || in_array($_SERVER['HTTP_HOST'], $DEV_IP_ARRAY)) {
            $ip_based_env_variable = "staging";
        }

        define('ENVIRONMENT', $ip_based_env_variable);

        if (ENVIRONMENT == "production") {
            $BASE_API_URL = "https://54.178.212.182/v5/";
        } else if (ENVIRONMENT == "staging") {
            $BASE_API_URL = "http://52.69.49.40/v5/";
        } else {
            //Nothing here
        }*/
        $DATA_FROM_SERVICE = callTheAPI(ENDPOINT, $methodFromCall, $urlFromCall, $paramsFromCall);
    } else {
        $DATA_FROM_SERVICE = json_encode(array("status" => FALSE, "meta" => array("total" => 0, "count" => 0), "error" => array("code" => 700, "message" => "Sorry, unable to contact the server!.")));
    }
} else {
    $DATA_FROM_SERVICE = json_encode(array("status" => FALSE, "meta" => array("total" => 0, "count" => 0), "error" => array("code" => 400, "message" => "Sorry, It must be a secure call.")));
}

header('Content-Type: application/json');
echo $DATA_FROM_SERVICE;

function callTheAPI($base, $httpmethod, $url, $params)
{
    //Start CURL call
    $curl = curl_init();
    $finalurl = $base . $url;


    if ($httpmethod == "PUT" || $httpmethod == "DELETE") {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $httpmethod);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    } else if ($httpmethod == "POST") {
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    } else {
        $finalurl = $finalurl . "?" . $params;
    }
    //Set CURL Options
    curl_setopt($curl, CURLOPT_URL, $finalurl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "admin:1234");

    //Execute Request
    $result = curl_exec($curl);
    //Close Connection
    curl_close($curl);
    return $result;
}
