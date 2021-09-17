<?php $title="Events";?>

<?php ob_start();?>

<?php include('searchform.php');?>

<div id='mainDiv'>
    <?php include('eventListItemView.php')?>
</div>

<?php $content= ob_get_clean();?>
<?php require("template.php");