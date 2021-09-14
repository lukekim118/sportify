<?php
require_once("./model/CoinManager.php");
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