<?php
// Connexion to the database: 
try {
    require("./controller/controller.php");
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

    switch ($action) {
        case "logIn":
            //I have to modify... 
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
            }
            login($email, $password);
            break;
        case "signUp":

            break;

        case "userPage":
            userPage();
            break;



        default:
            // s
            login();
            break;
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    $errorCode = $e->getCode();
    // require("./view/errorView.php");
}
