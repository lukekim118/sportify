<?php

require_once("./model/loginManager.php");


function login()
{
    // checkLogin($email, $password);
    require("./view/loginView.php");
}

function userPage()
{
    $loginManager = new loginManager();
    $userInfos = $loginManager->checkLogin($_POST["email"], $_POST["password"]);
    require("./view/userPageView.php");
}
