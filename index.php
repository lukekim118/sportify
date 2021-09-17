<?php
// Connexion to the database: 
try {
    require("./controller/controller.php");
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

    switch ($action) {
        case "landing":
            landing();
            break;

        default:
            landing();
            break;
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    $errorCode = $e->getCode();
    // require("./view/errorView.php");
}
