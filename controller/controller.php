<?php
require("./model/model.php");
require("./model/search.php");

function showAllEvents() {
    $events = showAllEvents();
    require("./view/eventView.php");
};

function searchAllEvents() {
    $events = searchAllEvents();
    require("./view/eventView.php");
    require("./view/searchForm.php");
};

function filterEvents() {
    $events = filterEvents();
    require("./view/eventView.php");
    require("./view/searchForm.php");
};