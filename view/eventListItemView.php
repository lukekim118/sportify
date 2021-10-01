<?php
if (empty($events)) {
    echo " No events matching your criteria ";
} else {
    foreach ($events as $event) { ?>
        <div class='eventBox'>
            <h2><?php echo $event['description'] ?></h2><br>
            <img class='eventPhoto' src='./public/img/<?php echo $event['id'] ?>.jpg' width='240' height='240'><br>
            <p>Price: <?php echo $event['price'] ?> USD | Date: <?php echo $event['start_time'] ?></p>
            <a id='link' href="index.php?action=eventView&eventid=<?php echo $event['id'] ?>">Display event..</a>
        </div>
<?php };
}; ?>