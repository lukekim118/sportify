<?php

if ($userInfos) {
    // print_r($userInfos);
    $email = $userInfos["email"];
    echo $email;
    echo "<br>";
    // echo $userInfos["email"];
    echo "Welcome to user page!";
}
