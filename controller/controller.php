<?php
require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");
require_once("./model/EventManager.php");

//Model view should be made by class(OOP),since I can just inherit db collector form parents

function login()
{
    // checkLogin($email, $password);
    require("./view/loginView.php");
}

function userPage($email, $password)
{
    $loginManager = new LoginManager();
    $userInfos = $loginManager->checkLogin($email, $password);
    require("./view/userPageView.php");
}

function signUp()
{
    require("./view/signUpView.php");
}

function createAccount($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone)
{
    $signUpManager = new signUpManager();
    $newUserInfos = $signUpManager->processSignUp($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone);
    // require("./model/signUpManager.php");
}

function searchAllEvents($search)
{
    $EventManager = new EventManager();
    $events = $EventManager->searchEvents($search);
    require("./view/eventListItemView.php");
}

function displayAllEvents() 
{
    $EventManager = new EventManager();
    $events = $EventManager->showAllEvents();
    require("./view/eventsView.php");
}

function filterAllEvents($price, $date, $indoor, $language, $noequipment, $duration) 
{
    $EventManager = new EventManager();
    $events = $EventManager->filterEvents($price, $date, $indoor, $language, $noequipment, $duration);
    require("./view/eventListItemView.php");
}
