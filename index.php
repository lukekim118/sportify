<?php
// Connexion to the database: 
try {
    require("./controller/controller.php");
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

    switch ($action) { 
        case "eventPage":
            eventPage();
            break;


        

           
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    $errorCode = $e->getCode();
    // require("./view/errorView.php");
}
