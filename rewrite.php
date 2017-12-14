<?php
/**
 * Created by PhpStorm.
 * User: anuragshukla
 * Date: 13/02/17
 * Time: 12:50 PM
 */
	//Include database connection file
    //Connect to the database
    $host="timesaverz-production.ctamavkwv0pa.ap-northeast-1.rds.amazonaws.com"; // Host name
    $username="timesaverzMaster"; // Mysql username
    $password="av0cad0!nd!a619#"; // Mysql password
    $db_name="timesaverz_v3"; // Database name

    // Connect to server and select database.
    $conn = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
    session_start();

    date_default_timezone_set('Asia/Kolkata');
    $resultTimezone = $conn->query("SET time_zone='+05:30'");

    //Turn off error reporting across website
    error_reporting(0);

	$path = $_SERVER['REQUEST_URI'];    			// Trim leading slash(es)
	$elements = explode('/', $path); 				// Get number of parameters in the rewritten URL
    var_dump($elements);
	//Initialize refer friend popup
	$_SESSION["showReferFriendPopup"] = "false";
	$_SESSION["myProfilePopup"] = "false";

	//Initialize cart items session key if not active
	if(!isset($_SESSION['cartItems']))
    {
        $_SESSION['cartItems'] = array();
    }

	$cookieExpiryDate = time() + 60 * 60 * 24 * 90;
	$_COOKIE["cartItemsCount"] = count($_SESSION['cartItems']);
	setCookie("cartItemsCount", count($_SESSION['cartItems']), $cookieExpiryDate, "/");

	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
    {
        $_COOKIE["timesaverz_mobile_web"] = "true";
        setCookie("timesaverz_mobile_web", "true", $cookieExpiryDate, "/");
    }
    else
    {
        setcookie("timesaverz_mobile_web", "", time()-1000, "/");
    }

	/*=======================================
		   FOOTER LINK REWRITE URLS
	=======================================*/

	if(explode("?", $elements[1])[0] == "gift-card")
    {
        if(explode("?", $elements[2])[0] == "thankyou")
        {
            $canonicalString = "thankyou";
            require_once("thankyou-giftcard.php");
        }
        else{
            $canonicalString = "order";
            require_once("thankyou-giftcard.php");
        }
    }

	if(explode("?", $elements[1])[0] == "subscription-package")
    {
        if(explode("?", $elements[2])[0] == "thankyou")
        {
            $canonicalString = "thankyou";
            require_once("thankyou-subscription-package.php");
        }
        else{
            $canonicalString = "order";
            require_once("thankyou-subscription-package.php");
        }
    }

	if(explode("?", $elements[1])[0] == "experience-cards")
    {
        http_response_code(301);
        header('Location: /gift-cards');
    }

    else if(explode("?", $elements[1])[0] == "thankyou")
    {
        $canonicalString = "thankyou";
        require_once("thankyou.php");
    }

    else if(explode("?", $elements[1])[0] == "error")
    {
        $canonicalString = "error";
        require_once("error.php");
    }

    else if(explode("?", $elements[1])[0] == "order")
    {
        $canonicalString = "order";
        require_once("error.php");
    }

    else if(explode("?", $elements[1])[0] == "gift-cards")
    {
        $canonicalString = "gift-cards";
        require_once("gift-cards.php");
    }

    else if(explode("?", $elements[1])[0] == "subscription-packages")
    {
        $canonicalString = "subscription-packages";
        $userID = isset($_COOKIE["timesaverzUserID"]) ? $_COOKIE["timesaverzUserID"] : 0;
        $userMobileNumber = isset($_GET["userMobileNumber"]) ? $_GET["userMobileNumber"] : 0;

        $fetchAllPackages = $conn->query("SELECT *
										  FROM user_packages up
										  LEFT JOIN packages p ON p.packageID = up.packageID
										  LEFT JOIN users u ON u.userID = up.userID
										  WHERE (u.userID = $userID OR u.userMobileNumber = $userMobileNumber) AND DATE(NOW()) <= validTill");
        if($fetchAllPackages && $fetchAllPackages->num_rows > 0)
        {
            require_once("subscription-details.php");
        }
        else
        {
            require_once("subscription-packages.php");
        }
    }

    else if(explode("?", $elements[1])[0] == "activations")
    {
        $canonicalString = "activations";
        $activationID = explode("-", $elements[2])[1];

        require_once("activations-lite.php");
    }

    else if(explode("?", $elements[1])[0] == "chat-booking")
    {
        $canonicalString = "chat-booking";
        $activationID = explode("-", $elements[2])[1];

        require_once("chat-production.html");
    }

    else if(explode("?", $elements[1])[0] == "quick-book")
    {
        $canonicalString = "quick-book";

        require_once("lead-capture-redesign.php");
    }

    else if(explode("?", $elements[1])[0] == "request-submitted")
    {
        $canonicalString = "request-submitted";

        require_once("request-submitted.php");
    }

    else if(explode("?", $elements[1])[0] == "be-the-santa")
    {
        $canonicalString = "be-the-santa";

        require_once("betheSanta.php");
    }

    else if(explode("?", $elements[1])[0] == "booking-feedback")
    {
        $canonicalString = "booking-feedback";
        $activationID = explode("-", $elements[2])[1];

        require_once("feedback.php");
    }

    else if(explode("?", $elements[1])[0] == "services")
    {
        $canonicalString = "services";

        if($elements[2] != "" && $elements[3] == "")
        {
            $supercategoryName = ucwords(explode("?", $elements[2])[0]);

            //Canonical output string
            $canonicalString .= "/".strtolower($supercategoryName);

            $resultSuperID = $conn->query("SELECT supercategoryDescription, s.supercategoryID
										   FROM supercategories s
										   LEFT JOIN categories c ON c.supercategoryID = s.supercategoryID
										   LEFT JOIN subcategories sub ON sub.categoryID = c.categoryID
										   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.cityID = 1
										   GROUP BY s.supercategoryID");
            if($resultSuperID && $resultSuperID->num_rows > 0)
            {
                $rowSuperName = $resultSuperID->fetch_assoc();
                $serviceDescription = $rowSuperName["supercategoryDescription"];
                $supercategoryID = $rowSuperName["supercategoryID"];

                require_once("servicepage-canonical.php");
            }
            else
            {
                require_once("service-unavailable.php");
            }
        }
        else if($elements[2] != "" && $elements[3] != "")
        {
            $supercategoryName = ucwords(explode("?", $elements[2])[0]);
            $categoryName = ucwords(explode("?", $elements[3])[0]);

            //Canonical output string
            $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

            $resultSuperID = $conn->query("SELECT subcategoryDescription, s.supercategoryID
										   FROM supercategories s
										   LEFT JOIN categories c ON c.supercategoryID = s.supercategoryID
										   LEFT JOIN subcategories sub ON sub.categoryID = c.categoryID
										   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = 1");
            if($resultSuperID && $resultSuperID->num_rows > 0)
            {
                $rowSuperName = $resultSuperID->fetch_assoc();
                $serviceDescription = $rowSuperName["subcategoryDescription"];
                $supercategoryID = $rowSuperName["supercategoryID"];
                require_once("servicepage-canonical.php");
            }
            else
            {
                require_once("service-unavailable.php");
            }
        }
    }

    else if(explode("?", $elements[1])[0] == "cart")
    {
        $canonicalString = "cart";

        require_once("cartMobile.php");
    }

    else if(explode("?", $elements[1])[0] == "feedback")
    {
        $canonicalString = "feedback";
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        {
            //Mobile browser - open TARS flow
            require_once("jobFeedback-TARS.html");
        }
        else
        {
            //Desktop version - responsive HTML
            require_once("jobFeedback-Web.php");
        }
    }

    else if(explode("?", $elements[1])[0] == "download-app")
    {
        $canonicalString = "download-app";

        require_once("downloadApp.php");
    }

    else if(explode("?", $elements[1])[0] == "booking")
    {
        $canonicalString = "continue-booking";
        $leadID = $elements[2];

        if($elements[2] == "" && $elements[3] != "") //For encrypted leadID which contain '/' in the beginning
            $leadID = "/".$elements[3];

        if($elements[2] != "" && $elements[3] != "")
            $leadID = $elements[2]."/".$elements[3];

        if($leadID != "")
            require_once("leadConverter.php");
        else
            require_once("404.php");
    }

    else if(explode("?", $elements[1])[0] == "convert")
    {
        $canonicalString = "continue-booking";
        $jobID = $elements[2];

        if($elements[2] == "" && $elements[3] != "") //For encrypted leadID which contain '/' in the beginning
            $jobID = "/".$elements[3];

        if($elements[2] != "" && $elements[3] != "")
            $jobID = $elements[2]."/".$elements[3];

        if($jobID != "")
            require_once("amcConverter.php");
        else
            require_once("404.php");
    }

    else if(explode("?", $elements[1])[0] == "offers")
    {
        $canonicalString = "offers";
        require_once("offerPage.php");
    }

    else if(explode("?", $elements[1])[0] == "about-us")
    {
        $canonicalString = "about-us";
        require_once("about-us.php");
    }

    else if(explode("?", $elements[1])[0] == "team")
    {
        require_once("404.php");
    }

    else if(explode("?", $elements[1])[0] == "careers")
    {
        $canonicalString = "careers";
        require_once("careers.php");
    }

    else if(explode("?", $elements[1])[0] == "faq")
    {
        $canonicalString = "faq";
        require_once("faqs.php");
    }

    else if(explode("?", $elements[1])[0] == "press")
    {
        $canonicalString = "press";
        require_once("press.php");
    }

    else if(explode("?", $elements[1])[0] == "trust-and-safety")
    {
        $canonicalString = "trust-and-safety";
        require_once("trust-and-safety.php");
    }

    else if(explode("?", $elements[1])[0] == "privacy-policy")
    {
        $canonicalString = "privacy-policy";
        require_once("privacy-policy.php");
    }

    else if(explode("?", $elements[1])[0] == "terms-of-use")
    {
        $canonicalString = "terms-of-use";
        require_once("terms.php");
    }

    else if(explode("?", $elements[1])[0] == "contact-us")
    {
        $canonicalString = "contact-us";
        require_once("contact-us.php");
    }
    else if(explode("?", $elements[1])[0] == "b2b")
    {
        $canonicalString = "b2b";
        require_once("b2b-landing.php");
    }
    else if(explode("?", $elements[1])[0] == "minutes")
    {
        $canonicalString = "minutes";
        require_once("minutes.php");
    }
    else if(explode("?", $elements[1])[0] == "how-to-earn")
    {
        $canonicalString = "how-to-earn";
        require_once("howToEarnMinutes.php");
    }

    /*=======================================
           HEADER LINK REWRITE URLS
    =======================================*/

    else if(explode("?", $elements[1])[0] == "see-all-services")
    {
        $canonicalString = "see-all-services";
        require_once("all-services.php");
    }

    else if(explode("?", $elements[1])[0] == "list-your-service")
    {
        $canonicalString = "list-your-service";
        require_once("newTimesaver.php");
    }

    /*=======================================
            ACCOUNT LINK REWRITE URLS
    =======================================*/

    else if(explode("?", $elements[1])[0] == "login")
    {
        $canonicalString = "login";
        require_once("login.php");
    }

    else if(explode("?", $elements[1])[0] == "dashboard")
    {
        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            $canonicalString = "dashboard";
            require_once("dashboard.php");
        }
    }

    else if(explode("?", $elements[1])[0] == "refer-a-friend")
    {
        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            $canonicalString = "refer-a-friend";
            $_SESSION["showReferFriendPopup"] = "true";
            require_once("dashboard.php");
        }
    }


    else if(explode("?", $elements[1])[0] == "profile")
    {
        $canonicalString = "profile";
        $_SESSION["myProfilePopup"] = "true";
        require_once("dashboard.php");
    }

    else if(explode("?", $elements[1])[0] == "referral")
    {
        $canonicalString = "refer-a-friend";
        $userReferralCode = $elements[2];

        if($userReferralCode != "")
        {
            $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
            setCookie("timesaverzReferredBy", $userReferralCode, $cookieExpiryDate, "/");
            require_once("referral.php");
        }
        else
            require_once("404.php");
    }

    else if(explode("?", $elements[1])[0] == "ticket")
    {
        header("Location: /support-center");
    }

    else if(explode("?", $elements[1])[0] == "support-center")
    {
        $canonicalString = "support-center";
        require_once("support-center.php");
    }

    else if(explode("?", $elements[1])[0] == "2016-review")
    {
        $canonicalString = "2016-review";

        if(explode("?", $elements[2])[0] != "") //Someone is viewing someone's year in review
        {
            $referralCode = explode("?", $elements[2])[0];
            $resultFetch = $conn->query("SELECT userID FROM users WHERE userReferralCode = '$referralCode'");
            if($resultFetch && $resultFetch->num_rows == 1)
            {
                $rowFetch = $resultFetch->fetch_assoc();
                $userID = $rowFetch["userID"];

                $canonicalString .= "/$referralCode";

                require_once("statistics.php");
            }
            else
            {
                require_once("404.php");
            }
        }
        else //See self year in review
        {
            if(!isset($_COOKIE["timesaverzUserLoggedIn"]) || $_COOKIE["timesaverzUserLoggedIn"] != "true")
            {
                header("Location: /login?urlTo=2016-review");
            }
            else
            {
                $userID = $_COOKIE["timesaverzUserID"];

                require_once("statistics.php");
            }
        }
    }

    else if(explode("?", $elements[1])[0] == "logout")
    {
        $canonicalString = "logout";
        require_once("logout.php");
    }

    /*=======================================
           CITY LINK REWRITE URLS
    =======================================*/
    else if(explode("?", $elements[1])[0] == "mumbai")
    {
        $canonicalString = "mumbai";
        $cityID = 1;
        $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
        setCookie("timesaverzUserCity", $cityID, $cookieExpiryDate, "/");
        setCookie("timesaverzUserCityName", "Mumbai", $cookieExpiryDate, "/");
        $_COOKIE['timesaverzUserCityName'] = "Mumbai";
        $_COOKIE['timesaverzUserCity'] = $cityID;

        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            if($elements[2] != null && $elements[3] == null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID 
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE s.supercategoryName = '".$supercategoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY s.supercategoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];

                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("categorylisting_mobile.php");
                    }
                    else{
                        require_once("categorylisting.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else if($elements[2] != null && $elements[3] != null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);
                $categoryName = ucwords(explode("?", $elements[3])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID, c.categoryID, c.categoryTemplate
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY c.categoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];
                    $categoryID = $rowSuperName["categoryID"];
                    $categoryTemplate = $rowSuperName["categoryTemplate"];

                    $categoryTemplate_mobile = $rowSuperName["categoryTemplate"]."_mobile";
                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("servicepage-$categoryTemplate_mobile.php");
                    }
                    else{
                        require_once("servicepage-$categoryTemplate.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else
            {
                $cityName = $elements[1];
                require_once("index.php");
            }
        }

    }

    else if(explode("?", $elements[1])[0] == "pune")
    {
        $canonicalString = "pune";
        $cityID = 2;
        $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
        setCookie("timesaverzUserCity", $cityID, $cookieExpiryDate, "/");
        setCookie("timesaverzUserCityName", "Pune", $cookieExpiryDate, "/");
        $_COOKIE['timesaverzUserCityName'] = "Pune";
        $_COOKIE['timesaverzUserCity'] = $cityID;

        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            if($elements[2] != null && $elements[3] == null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID 
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE s.supercategoryName = '".$supercategoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY s.supercategoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];

                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("categorylisting_mobile.php");
                    }
                    else{
                        require_once("categorylisting.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else if($elements[2] != null && $elements[3] != null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);
                $categoryName = ucwords(explode("?", $elements[3])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID, c.categoryID, c.categoryTemplate
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY c.categoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];
                    $categoryID = $rowSuperName["categoryID"];
                    $categoryTemplate = $rowSuperName["categoryTemplate"];

                    $categoryTemplate_mobile = $rowSuperName["categoryTemplate"]."_mobile";
                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("servicepage-$categoryTemplate_mobile.php");
                    }
                    else{
                        require_once("servicepage-$categoryTemplate.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else
            {
                $cityName = $elements[1];
                require_once("index.php");
            }
        }
    }

    else if(explode("?", $elements[1])[0] == "bengaluru")
    {
        http_response_code(301);
        $newURL = str_replace("bengaluru", "bangalore", $path);
        header("Location: ".$newURL);
    }

    else if(explode("?", $elements[1])[0] == "bangalore")
    {
        $canonicalString = "bangalore";
        $cityID = 3;
        $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
        setCookie("timesaverzUserCity", $cityID, $cookieExpiryDate, "/");
        setCookie("timesaverzUserCityName", "Bangalore", $cookieExpiryDate, "/");
        $_COOKIE['timesaverzUserCityName'] = "Bangalore";
        $_COOKIE['timesaverzUserCity'] = $cityID;

        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            if($elements[2] != null && $elements[3] == null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID 
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE s.supercategoryName = '".$supercategoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY s.supercategoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];

                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("categorylisting_mobile.php");
                    }
                    else{
                        require_once("categorylisting.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else if($elements[2] != null && $elements[3] != null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);
                $categoryName = ucwords(explode("?", $elements[3])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID, c.categoryID, c.categoryTemplate
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY c.categoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];
                    $categoryID = $rowSuperName["categoryID"];
                    $categoryTemplate = $rowSuperName["categoryTemplate"];

                    $categoryTemplate_mobile = $rowSuperName["categoryTemplate"]."_mobile";
                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("servicepage-$categoryTemplate_mobile.php");
                    }
                    else{
                        require_once("servicepage-$categoryTemplate.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else
            {
                $cityName = $elements[1];
                require_once("index.php");
            }
        }

    }

    else if(explode("?", $elements[1])[0] == "hyderabad")
    {
        $canonicalString = "hyderabad";
        $cityID = 5;
        $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
        setCookie("timesaverzUserCity", $cityID, $cookieExpiryDate, "/");
        setCookie("timesaverzUserCityName", "Hyderabad", $cookieExpiryDate, "/");
        $_COOKIE['timesaverzUserCityName'] = "Hyderabad";
        $_COOKIE['timesaverzUserCity'] = $cityID;

        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            if($elements[2] != null && $elements[3] == null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID 
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE s.supercategoryName = '".$supercategoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY s.supercategoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];

                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("categorylisting_mobile.php");
                    }
                    else{
                        require_once("categorylisting.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else if($elements[2] != null && $elements[3] != null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);
                $categoryName = ucwords(explode("?", $elements[3])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID, c.categoryID, c.categoryTemplate
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY c.categoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];
                    $categoryID = $rowSuperName["categoryID"];
                    $categoryTemplate = $rowSuperName["categoryTemplate"];

                    $categoryTemplate_mobile = $rowSuperName["categoryTemplate"]."_mobile";
                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("servicepage-$categoryTemplate_mobile.php");
                    }
                    else{
                        require_once("servicepage-$categoryTemplate.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else
            {
                $cityName = $elements[1];
                require_once("index.php");
            }
        }

    }

    else if(explode("?", $elements[1])[0] == "gurgaon")
    {
        $canonicalString = "gurgaon";
        $cityID = 6;
        $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
        setCookie("timesaverzUserCity", $cityID, $cookieExpiryDate, "/");
        setCookie("timesaverzUserCityName", "Gurgaon", $cookieExpiryDate, "/");
        $_COOKIE['timesaverzUserCityName'] = "Gurgaon";
        $_COOKIE['timesaverzUserCity'] = $cityID;

        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            if($elements[2] != null && $elements[3] == null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID 
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE s.supercategoryName = '".$supercategoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY s.supercategoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];

                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("categorylisting_mobile.php");
                    }
                    else{
                        require_once("categorylisting.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else if($elements[2] != null && $elements[3] != null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);
                $categoryName = ucwords(explode("?", $elements[3])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID, c.categoryID, c.categoryTemplate
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY c.categoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];
                    $categoryID = $rowSuperName["categoryID"];
                    $categoryTemplate = $rowSuperName["categoryTemplate"];

                    $categoryTemplate_mobile = $rowSuperName["categoryTemplate"]."_mobile";
                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("servicepage-$categoryTemplate_mobile.php");
                    }
                    else{
                        require_once("servicepage-$categoryTemplate.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else
            {
                $cityName = $elements[1];
                require_once("index.php");
            }
        }
    }

    else if(explode("?", $elements[1])[0] == "delhi")
    {
        $canonicalString = "delhi";
        $cityID = 8;
        $cookieExpiryDate = time() + 60 * 60 * 24 * 90;
        setCookie("timesaverzUserCity", $cityID, $cookieExpiryDate, "/");
        setCookie("timesaverzUserCityName", "Delhi", $cookieExpiryDate, "/");
        $_COOKIE['timesaverzUserCityName'] = "Delhi";
        $_COOKIE['timesaverzUserCity'] = $cityID;

        if((strpos($useragent,'android') !== false || strpos($useragent,'ipad') !== false || strpos($useragent,'iphone') !== false || strpos($useragent,'ipod') !== false) && $_SESSION['showMobileWeb'] == "activated")
        {
            $requestURL = $_SERVER['REQUEST_URI'];
            require_once("landingpage.php");
        }
        else
        {
            if($elements[2] != null && $elements[3] == null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID 
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE s.supercategoryName = '".$supercategoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY s.supercategoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];

                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("categorylisting_mobile.php");
                    }
                    else{
                        require_once("categorylisting.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else if($elements[2] != null && $elements[3] != null)
            {
                $cityName = $elements[1];
                $supercategoryName = ucwords(explode("?", $elements[2])[0]);
                $categoryName = ucwords(explode("?", $elements[3])[0]);

                //Canonical output string
                $canonicalString .= "/".strtolower($supercategoryName)."/".strtolower($categoryName);

                $resultSuperID = $conn->query("SELECT s.supercategoryID, c.categoryID, c.categoryTemplate
											   FROM categories c
											   LEFT JOIN supercategories s ON c.supercategoryID = s.supercategoryID
											   WHERE c.categoryVisibility = 1 AND s.supercategoryName = '".$supercategoryName."' AND c.categoryName = '".$categoryName."' AND c.cityID = ".$cityID." 
											   GROUP BY c.categoryID");
                if($resultSuperID && $resultSuperID->num_rows > 0)
                {
                    $rowSuperName = $resultSuperID->fetch_assoc();
                    $supercategoryID = $rowSuperName["supercategoryID"];
                    $categoryID = $rowSuperName["categoryID"];
                    $categoryTemplate = $rowSuperName["categoryTemplate"];

                    $categoryTemplate_mobile = $rowSuperName["categoryTemplate"]."_mobile";
                    if(isset($_COOKIE['timesaverz_mobile_web'])){
                        require_once("servicepage-$categoryTemplate_mobile.php");
                    }
                    else{
                        require_once("servicepage-$categoryTemplate.php");
                    }
                }
                else
                {
                    require_once("service-unavailable.php");
                }
            }
            else
            {
                $cityName = $elements[1];
                require_once("index.php");
            }
        }

    }

    else if(explode("?", $elements[1])[0] == "instamojo")
    {
        if($elements[2] != "")
        {
            $canonicalString = "instamojo";
            $jobID = $elements[2];
            require_once("makeOrderPayment.php");
        }
        else
        {
            header("Location: //".$_SERVER['HTTP_HOST']);
        }
    }

    else if(explode("?", $elements[1])[0] == "payment")
    {
        if($elements[2] != "")
        {
            $canonicalString = "payment";
            $jobID = $elements[2];
            require_once("paymentSelection.php");
        }
        else
        {
            header("Location: //".$_SERVER['HTTP_HOST']);
        }
    }

    else if(explode("?", $elements[1])[0] == "home")
    {
        http_response_code(301);
        header("Location: //".$_SERVER['HTTP_HOST']);
    }

    else if(explode("?", $elements[1])[0] == "laundry-tnc")
    {
        require_once("laundry-tnc.php");
    }

    else if(explode("?", $elements[1])[0] == "driver-rate-chart")
    {
        require_once("driver-rate-chart.php");
    }

    else if(explode("?", $elements[1])[0] == "umumba-offer")
    {
        //Check if UTM querystring has been passed
        if(isset($_GET["utm_source"]) || isset($_GET["utm_medium"]) || isset($_GET["utm_term"]) || isset($_GET["utm_campaign"]))
        {
            if($_GET["utm_source"] != "")
                $_COOKIE["utm_source"] = $_GET["utm_source"];
            else
                $_COOKIE["utm_source"] = "direct";

            if($_GET["utm_medium"] != "")
                $_COOKIE["utm_medium"] = $_GET["utm_medium"];
            else
                $_COOKIE["utm_medium"] = "direct";

            if($_GET["utm_term"] != "")
                $_COOKIE["utm_term"] = $_GET["utm_term"];
            else
                $_COOKIE["utm_term"] = "direct";

            if($_GET["utm_campaign"] != "")
                $_COOKIE["utm_campaign"] = $_GET["utm_campaign"];
            else
                $_COOKIE["utm_campaign"] = "direct";
        }

        require_once("umumba-offer.php");
    }

    else if(explode("?", $elements[1])[0] == "ind-day-16")
    {
        //Check if UTM querystring has been passed
        if(isset($_GET["utm_source"]) || isset($_GET["utm_medium"]) || isset($_GET["utm_term"]) || isset($_GET["utm_campaign"]))
        {
            $_COOKIE["utm_source"] = $_GET["utm_source"];
            $_COOKIE["utm_medium"] = $_GET["utm_medium"];
            $_COOKIE["utm_term"] = $_GET["utm_term"];
            $_COOKIE["utm_campaign"] = $_GET["utm_campaign"];
        }

        require_once("independence-day-2016.php");
    }

    else if(explode("?", $elements[1])[0] == "diwali-offer")
    {
        require_once("service-unavailable.php");
    }

    else if(explode("?", $elements[1])[0] == "404")
    {
        require_once("404.php");
    }

    else if(explode("?", $elements[1])[0] == "service-unavailable")
    {
        require_once("service-unavailable.php");
    }

    /*
     * Agent App Webviews
     */
    else if(explode("?", $elements[1])[0] == "agent")
    {
        if(explode("?", $elements[2])[0] == "what-is-recharge")
        {
            require_once("/agent-webviews/what-is-recharge.php");
        }
        else
        {
            require_once("404.php");
        }
    }

    else
    {
        require_once("404.php");
    }
?>