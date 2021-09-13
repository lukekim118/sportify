<?php
function showAllEvents() {
    try 
{
    $db = new PDO('mysql:host=localhost;dbname=batch13;charset=utf8', 'root', '');
} 
catch (Exception $e) 
{
    $errorMessage = $e->getmessage();
    include("view/error.php");
}

$response = $db->query('SELECT description, difficulty, duration, price, start_time FROM events ORDER BY start_time DESC');
$events = $response->fetchAll(PDO::FETCH_ASSOC);
return $events;
};

function searchEvents() {
    try 
{
    $db = new PDO('mysql:host=localhost;dbname=batch13;charset=utf8', 'root', '');
} 
catch (Exception $e) 
{
    $errorMessage = $e->getmessage();
    include("view/error.php");
}

$search = ($_POST['search']);
$response = $db->query("SELECT * FROM events WHERE description LIKE '%$search%'");
$events = $response->fetchAll(PDO::FETCH_ASSOC);
return $events;
}

function filterEvents() {
    try 
{
    $db = new PDO('mysql:host=localhost;dbname=batch13;charset=utf8', 'root', '');
} 
catch (Exception $e) 
{
    $errorMessage = $e->getmessage();
    include("view/error.php");
}

switch ($_POST['price']) {
    case 'lowerprice':
        $price = 'price <=10';
        break;
    case 'mediumprice':
        $price = 'price >=10 AND price <=20';
        break;
    case 'higherprice':
        $price = 'price >=20';
        break;
    default :
        $price = 'price > 0';
        break;
}
switch ($_POST['date']) {
    case 'thiweek' :
        $date = 'AND start_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), interval 7 day)';
        break;
    case 'thismonth' :
        $date = 'AND start_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), interval 1 month)';
        break;
    case 'nextmonths' :
        $date = 'AND start_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), interval 3 month)';
        break;
    default :
        $date = '';
        break;
}
switch ($_POST['indoor']) {
    case 'indoor' :
        $indoor = 'AND indoor_outdoor="Indoor"';
        break;
    case 'outdoor' :
        $indoor = 'AND indoor_outdoor="Outdoor"';
        break;
    default :
        $indoor = '';
}
switch ($_POST['language']) {
    case 'other' :
        $language = '';
        break;
    default :
        $selectedLanguage = $_POST['language'];
        $language = "AND languages='$selectedLanguage'";
        break;
}
if (isset($_POST['noequipment'])){
    $equipment = 'AND equipment IS NULL';
} else {
    $equipment = '';
}
if (isset($_POST['duration'])){
    $duration = 'AND duration<=2';
} else {
    $duration = '';
}
$response = $db->query("SELECT * FROM events WHERE $price $date $indoor $language $equipment $duration");
$events = $response->fetchAll(PDO::FETCH_ASSOC);
return $events;
require('./view/eventListItemView.php');
}