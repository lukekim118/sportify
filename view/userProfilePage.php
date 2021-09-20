<?php $title="Profile";?>

<?php ob_start();?>

<div id='mainDiv'>

    <?= 'dog' ?>

</div>

<?php $content= ob_get_clean();?>
<?php require("template.php");