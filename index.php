<?php

try {
    require("./controller/controller.php"); //Connection to the database:
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

    switch ($action) {
        case "loginpage":
            login();
            break;
        case "landing":
            landing();
            break;
        case "login":
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
            }
            login($email, $password);
            break;
        case "signup":
            signUp();
            break;
        case "signUpControl":
            if (!empty($_POST["emailAddress"])) {
                $emailAddress = $_POST["emailAddress"];
            }
            if (!empty($_POST["firstname"])) {
                $firstname = $_POST["firstname"];
            }
            if (!empty($_POST["lastname"])) {
                $lastname = $_POST["lastname"];
            }
            if (!empty($_POST["newPassword"])) {
                $newPassword = $_POST["newPassword"];
            }
            if (!empty($_POST["rePassword"])) {
                $rePassword = $_POST["rePassword"];
            }
            if (!empty($_POST["phone"])) {
                $phone = $_POST["phone"];
            } else {
                $phone = NULL;
            }
            createAccount($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone);
            break;
        case "userpage":
            // print_r($_POST);
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                userPage($email, $password);
            } else if (!empty($_POST["email"]) && !empty($_POST["givenName"])) {
                // userPage($_POST["email"], NULL);
                $email = $_POST["email"];
                $givenName = $_POST["givenName"];
                $familyName = $_POST["familyName"];
                $imageURL = $_POST["imageURL"];
                $tokenId = $_POST["tokenId"];
                googleLogin($email, $givenName, $familyName, $imageURL, $tokenId);
            } else {
                throw new Exception("Please put a valid user information.");
            }
            break;
        case "profile":
            userPage($_SESSION['sessionUserId'], $_SESSION['sessionPassword']);
            break;
        case "events":
            displayAllEvents();
            break;
        case "search":
            searchAllEvents($_POST['search']);
            break;
        case "filter":
            filterAllEvents($_POST['price'], $_POST['date'], $_POST['indoor'], $_POST['language'], $_POST['noequipment'], $_POST['duration']);
            break;
        case "eventPage":
            eventPage();
            break;
        case "editprofileinfo":
            editProfile($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['nickname'], $_POST['phone'], $_POST['age'], $_POST['languages'], $_POST['sport_interests']);
            break;
        case "uploadphoto":
            uploadPhoto($_FILES);
            break;
        case "submitCert":
            submitCert($_FILES);
            break;
        case "logout":
            logout();
        case "purchaseCoin":
            addCoins($_POST['coin']);
            break;
        case "viewCoins":
            viewCoins();
            break;
        case "useCoins":
            useCoins($_POST['coin']);
            break;
        case "refund":
            refundCoins();
            break;
        case "eventView":
            eventView($_REQUEST['eventid']);
            break;
        case "createEvent":
            createEvent();
            break;
        case "addEvent":
            addEvents($_POST);
            // addEvents($_POST['description'],$_POST['start_time'],$_POST['duration'],$_POST['indoor_outdoor'],$_POST['price'],$_POST['languages'],$_POST['equipment'],$_POST['number_of_people'],$_POST['difficulty']);
            break;
        case "removeEvent":
            removeEvents($_GET['eventid']);
            break;
        default:
            login();
            break;
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    $line = $e->getLine();
    $file = $e->getFile();
    // $errorCode = $e->getCode();
    require("./view/errorView.php");
}
