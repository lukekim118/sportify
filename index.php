<?php
//Connection to the database: 
try {
    require("./controller/controller.php");
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

    switch ($action) {
            // case "logIn":
            //     if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            //         $email = $_POST["email"];
            //         $password = $_POST["password"];
            //     }
            //     login($email, $password);

        case "signUp":
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

        case "userPage":
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
        case "events" : 
            displayAllEvents();
            break;
        case "search" :
            searchAllEvents($_POST['search']);
            break;
        case "filter" :
            filterAllEvents($_POST['price'], $_POST['date'], $_POST['indoor'], $_POST['language'], $_POST['noequipment'], $_POST['duration']);
            break;
        default:
            login();
            break;
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    // $errorCode = $e->getCode();
    require("./view/errorView.php");
}