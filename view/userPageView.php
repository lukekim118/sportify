<?php

if ($userInfos) {
    // print_r($userInfos);
    $firstName = $userInfos["first_name"];
    echo "<h2>Hello!</h2>";
    echo  $firstName;
    echo "<br>";
    // echo $userInfos["email"];
    echo "Welcome to user page!";
}
