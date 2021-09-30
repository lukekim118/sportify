<?php $title="Purchase"?>
<?php ob_start();?>
<div>amount of coins</div>
<div><?=$coins?></div>
<form method="POST" action="index.php">
    <input type="hidden" value="purchaseCoin" name="action">
    <input type="radio" value="10" name="coin">
    <label for="coin">10 Coins for $10</label> <br>
    <input type="radio" value="110" name="coin">
    <label for="coin">110 Coins for $100</label> <br>
    <input type="submit" value="Purchase">
</form>
<form action="index.php" method="POST">
    <input type="hidden" value="useCoins" name="action">
    <!-- <input type="radio" value="10" name="coin"> -->
    <label for="coin">spend 10 coins</label>
    <input type="submit" value="10" name="coin">
    <!-- <input type="submit" value="USE"> -->
</form>
<form action="index.php" method="POST">
    <input type="hidden" value="refund" name="action">
    <input type="submit" value="refund">
</form>
<?php 
require("displayCoins.php");

$content = ob_get_clean();?>
<?php require_once('template.php');?>