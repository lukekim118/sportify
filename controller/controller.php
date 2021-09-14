<?php
require_once("./model/CoinManager.php");
require_once("./model/LoginManager.php");
require_once("./model/SignUpManager.php");
require_once("./model/model.php");

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
    // require("./model/ignUpManager.php");
}
function displayAllEvents() {
    $events = showAllEvents();
    require("./view/eventsView.php");
};
//These might be needed later
// function searchAllEvents() {
//     $events = searchEvents();
//     require("./view/eventsView.php");
//     require("./view/searchForm.php");
// };

// function filterAllEvents() {
//     $events = filterEvents();
//     require("./view/eventsView.php");
//     require("./view/searchForm.php");
// };

function addCoins($addBal) {
    $coinManager = new CoinManager();
    $showBal = $coinManager->viewCoins();
    $newBal = $showBal+$addBal;
    $coinManager->changeCoins($newBal);
    // require("./view/indexView.php");
}
function useCoins(){

}
function refundCoins(){

}
function refundAllCoins(){

}
function viewCoinOptions() {
    $coinManager = new CoinManager();
    $showBal = $coinManager->viewCoins();
    require("./view/coinOptions.php");
}
