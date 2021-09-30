<?php
require_once("./model/CoinManager.php");
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
    $coinManager->transAdd($addBal);
    header('Location:index.php?action=viewCoins'); //back to the profile page
}
function useCoins($useBal){
    $coinManager = new CoinManager();
    $showBal = $coinManager->viewCoins();
    $newBal = $showBal-$useBal;
    $coinManager->changeCoins($newBal);
    $coinManager->transSpent($useBal);
    // Use in Attend events
    header('Location:index.php?action=viewCoins');
}
function refundCoins(){
    $coinManager = new CoinManager();
    $showBal = $coinManager->viewCoins();
    $showSpent= $coinManager->showSpent();
    $refund = round($showSpent*0.8);
    $newBal = $showBal + $refund;
    $coinManager->changeCoins($newBal);
    $coinManager->transRefund($refund);
    //header back to event page
    header('Location:index.php?action=viewCoins');
}
function showTransaction(){

}
function refundAllCoins($refund){
    $coinManager = new CoinManager();
    $showBal = $coinManager->viewCoins();
    $showSpent= $coinManager->showSpent();
    $newBal = $showBal + $showSpent;
    $coinManager->changeCoins($newBal);
    $coinManager->transRefund($refund);
    header('Location:index.php?action=viewCoins');
}
function viewCoins() {
    $coinManager = new CoinManager();
    $coins = $coinManager->viewCoins();
    require("./view/viewCoins.php");
}

function eventView($eventId) {
    require("./view/eventView.php");
}

function addEvents($params) {
    if(isset($params['description'])){
        $description=$params['description'];
    }
    if(isset($params['start_time'])){
        $start_time=$params['start_time'];
    }
    if(isset($params['duration'])){
        $duration=$params['duration'];
    }
    if(isset($params['indoor_outdoor'])){
        $indoor_outdoor=$params['indoor_outdoor'];
    }
    if(isset($params['price'])){
        $price=$params['price'];
    }
    if(isset($params['languages'])){
        $languages=$params['languages'];
    }
    if(isset($params['equipment'])){
        $equipment=$params['equipment'];
    }
    if(isset($params['number_of_people'])){
        $number_of_people=$params['number_of_people'];
    }
    if(isset($params['difficulty'])){
        $difficulty=$params['difficulty'];
    }
    $eventManager = new EventManager();
    $eventManager->addEvent($description,$start_time,$duration,$indoor_outdoor,$price,$languages,$equipment,$number_of_people,$difficulty);
    header('Location:index.php?action=eventView');
}
function listEvents($id){
    $eventManager = new EventManager();
    $eventManager->listEvent($id);
    require("./view/eventView.php");
}
function removeEvents($id){
    $eventManager = new EventManager();
    $eventManager->removeEvent($id);
}