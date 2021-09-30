<?php $title = "Events"; ?>
<?php $style = "eventview.css"; ?>

<?php ob_start(); ?>

<?php include('searchform.php'); ?>

<div id='mainDiv'>
    <?php include('eventListItemView.php') ?>
</div>

<script src='./public/js/events.js'></script>
<?php $content = ob_get_clean(); ?>
<?php require("template.php");
