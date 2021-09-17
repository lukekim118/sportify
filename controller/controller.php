<?php 

require_once("./model/EventManager.php");
require_once("./model/UserManager.php");

function eventPage() {
    require("./view/eventPage.php");
}

function landing() {
    require("./view/landing.php");
}

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

function googleLogin($email, $givenName, $familyName, $imageURL, $tokenId)
{
    $userManager = new UserManager();
    $userInfos = $userManager->googleSignUp($email, $givenName, $familyName, $imageURL, $tokenId);
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
    require("./view/userPageView.php");
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
