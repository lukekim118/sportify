<?php $title = "Events"; ?>
<?php ob_start(); ?>
<h3>Fill in description</h3>
<form action="index.php" method="POST">
    <input type="hidden" value="addEvent" name="action">
    <label for="description">Event description</label>
    <input type="text" name="description"> <br>
    <label for="start_time">Date</label>
    <input type="datetime-local" name="start_time"> <br>
    <label for="duration">Duration in hours</label>
    <input type="number" name="duration"> <br>


    <label for="indoor">indoor</label>
    <input type="radio" id="indoor" name="indoor_outdoor" value="indoor"><br>
    <label for="outdoor">outdoor</label>
    <input type="radio" id="outdoor" name="indoor_outdoor" value="outdoor"><br>


    <label for="price">Price</label>
    <input type="number" name="price"><br>
    <label for="languages">Languages</label>
    <input type="text" name="languages"><br>
    <label for="equipment">Equipment</label>
    <input type="text" name="equipment"><br>
    <label for="number_of_people">Number of people</label>
    <input type="number" name="number_of_people"><br>
    <label for="difficulty">Difficulty</label>
    <input type="text" name="difficulty"><br>
    <input type="submit" value="ADD EVENT">
</form>
<?php $content = ob_get_clean();
require_once("template.php");
?>