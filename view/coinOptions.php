<?php $title = "Purchase Coins";?>
<?php ob_start();?>
<form method="POST" action="index.php">
    <input type="hidden" value="purchaseCoin" name="action">
    <input type="radio" value="10" name="coin">
    <label for="coin">10 Coins for $10</label>
    <input type="radio" value="110" name="coin">
    <label for="coin">110 Coins for $100</label>
    <input type="submit" value="Purchase">
</form>
<?php $content = ob_get_clean();?>
<?php require_once('template.php');?>




