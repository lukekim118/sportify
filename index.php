<?php
// Connexion to the database: 
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
            print_r($_POST);
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                userPage($email, $password);
            } else if (!empty($_POST["email"])) {
                // userPage($_POST["email"], NULL);
                echo "helo";
            } else {
                echo $_REQUEST["email"];
                throw new Exception("Please put a valid user information");
            }
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
