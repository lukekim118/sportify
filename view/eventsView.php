<?php $title="All Upcoming Events";?>

<?php ob_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="./public/css/eventview.css">
</head>
<body>
    <?php require('searchform.php');?>
    <div id='mainDiv'>
    <?php 
        showAllEvents();
        foreach ($events as $event) {
        include('eventListItemView.php');
        };?>
    </div>
</body>
</html>

<?php $content= ob_get_clean();?>
<?php require ("template.php");