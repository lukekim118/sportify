<?php $title="View Event";?>
<?php ob_start();?>
    <div class='eventBox'>
        <h2><?php echo $event['description']?></h2><br>
        <img class='eventPhoto' src='./public/img/test.jpg' width='240' height='240'><br>
        <p>Price: <?php echo $event['price']?> USD</p>
        <p>Starting: <?php echo $event['start_time']?></p>
    </div>
<?php $content= ob_get_clean();?>
<?php require('template.php');