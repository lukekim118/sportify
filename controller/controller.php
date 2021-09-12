<?php
require("./model/model.php");

function displayAllEvents() {
    $events = showAllEvents();
    require("./view/eventsView.php");
};

// function searchAllEvents() {
//     $events = searchEvents();
//     require("./view/eventsView.php");
//     require("./view/searchForm.php");
// };

// function filterAllEvents() {
//     $events = filterEvents();
//     require("./view/eventsView.php");
//     require("./view/searchForm.php");
// };