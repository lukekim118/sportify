<?php $title="viewEvent";?>
<?php ob_start();?>
    echo
    "<div class='eventBox'>
    <h2>".$event['description']."</h2><br>
    <img class='eventPhoto' src='../public/img/test.jpg' width='250 height='250'><br>
    <p>Price: ".$event['price'].' KRW'."</p>
    <p> Starting: ".$event['start_time']."</p>
    </div>";
<?php $content= ob_get_clean();?>