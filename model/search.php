<?php
if (isset($_POST['search'])){
    $search = $_POST['search'];
    searchEvents();
    if(!$events){
        echo "NO RESULTS";
        } else {
            foreach ($events as $event) {
                include('../view/eventListView.php');};
        };
} elseif (isset($_POST['filters'])){
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
    filterEvents();
    if(!$events){
        echo "NO RESULTS";
        } else {
            foreach ($events as $event) {
            include('../view/eventListView.php');
        };};
}