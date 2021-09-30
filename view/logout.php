<?php
session_start();
unset($_SESSION["sessionUserId"]);
unset($_SESSION["sessionPassword"]);
header("Location: index.php?action=landing");
