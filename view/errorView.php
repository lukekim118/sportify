<?php $title = "Error page"; ?>

<?php ob_start(); ?>

<div>
    <h1>Error</h1>
    <p>Error message: <?= $errorMsg ?></p>
    <p>In file: <?= $file ?></p>
    <p>Line: <?= $line ?></p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require("template.php"); ?>