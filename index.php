<?php
// Connexion to the database: 
try {
    require("./controller/controller.php");
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

    switch ($action) {
        case "purchaseCoin":
            if(isset($_POST['coin10'])){
                manageCoins(10);
            } elseif(isset($_POST['coin110'])){
                manageCoins(110);
            }
        break;
        default:
            viewCoinOptions();
            break;
    }
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    // $errorCode = $e->getCode();
    require("./view/errorView.php");
}
