<?php
require("./controller/controller.php");
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

switch($action) {
    case "events" : 
        displayAllEvents();
        break;
};