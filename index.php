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
            if (isset($_POST["emailAddress"])) {
                $emailAddress = $_POST["emailAddress"];
            }
            if (isset($_POST["firstname"])) {
                $firstname = $_POST["firstname"];
            }
            if (isset($_POST["lastname"])) {
                $lastname = $_POST["lastname"];
            }
            if (isset($_POST["newPassword"])) {
                $newPassword = $_POST["newPassword"];
            }
            if (isset($_POST["rePassword"])) {
                $rePassword = $_POST["rePassword"];
            }
            if (isset($_POST["phone"])) {
                $phone = $_POST["phone"];
            } else {
                $phone = "";
            }

            createAccount($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone);
            break;

        case "userPage":
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
            }
            userPage($email, $password);
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