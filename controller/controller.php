<?php

require_once("./model/UserManager.php");


//Model view should be made by class(OOP),since I can just inherit db collector form parents

function login()
{
    // checkLogin($email, $password);
    require("./view/loginView.php");
}

function userPage($email, $password)
{
    $userManager = new UserManager();
    $userInfos = $userManager->checkLogin($email, $password);
    require("./view/userPageView.php");
}

function signUp()
{
    require("./view/signUpView.php");
}
function createAccount($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone)

{
    $userManager = new UserManager();
    $newUserInfos = $userManager->processSignUp($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone);
    // require("./model/signUpManager.php");
}
