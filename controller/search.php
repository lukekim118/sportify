<?php
require("../model/model.php");

if (isset($_POST['search'])){
    $events = searchEvents();
    if(!$events){
        include('../view/error.php');
        } else {
            foreach ($events as $event) {
                include('../view/eventListItemView.php');};
        };
}

elseif (isset($_POST['applyFilters'])){
    $events = filterEvents();
    if(!$events){
        include('../view/error.php');
        } else {
            foreach ($events as $event) {
            include('../view/eventListItemView.php');
        };};
}