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
}

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

$response = $db->query("SELECT * FROM events WHERE $price $date $indoor $language $equipment $duration");
$events = $response->fetchAll(PDO::FETCH_ASSOC);
return $events;
}