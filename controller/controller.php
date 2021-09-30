<?php

require_once("./model/EventManager.php");
require_once("./model/UserManager.php");

function eventPage()
{
    require("./view/eventPage.php");
}

function landing()
{
    require("./view/landing.php");
}

function login()
{
    // checkLogin($email, $password);
    require("./view/loginView.php");
}

function userPage($email, $password)
{
    $userManager = new UserManager();
    $userInfos = $userManager->checkLogin($email, $password);
    require("./view/userPageView.php");
}

function googleLogin($email, $givenName, $familyName, $imageURL, $tokenId)
{
    $userManager = new UserManager();
    $userInfos = $userManager->googleSignUp($email, $givenName, $familyName, $imageURL, $tokenId);
    require("./view/userPageView.php");
}

function signUp()
{
    require("./view/signUpView.php");
}

function createAccount($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone)

{
    $userManager = new UserManager();
    $newUserInfos = $userManager->processSignUp($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone);
    // require("./model/signUpManager.php");
    require("./view/loginView.php");
    // require("./view/userPageView.php");
}

function showProfile($email)
{
    $userManager = new UserManager();
    $userData = $userManager->displayUserProfile($email);
    require("./view/userPageView.php");
}

function searchAllEvents($search)
{
    $EventManager = new EventManager();
    $events = $EventManager->searchEvents($search);
    require("./view/eventListItemView.php");
}

function displayAllEvents()
{
    $EventManager = new EventManager();
    $events = $EventManager->showAllEvents();
    require("./view/eventsView.php");
}

function filterAllEvents($price, $date, $indoor, $language, $noequipment, $duration)
{
    $EventManager = new EventManager();
    $events = $EventManager->filterEvents($price, $date, $indoor, $language, $noequipment, $duration);
    require("./view/eventListItemView.php");
}

function editProfile($email, $first_name, $last_name, $nickname, $phone, $age, $languages, $sport_interests)
{
    $UserManager = new UserManager();
    $newDataUpdate = $UserManager->updateInfo($email, $first_name, $last_name, $nickname, $phone, $age, $languages, $sport_interests);
}

function uploadPhoto($photo_files)
{
    if ($photo_files['profilePhoto']['error'] > 0) throw new Exception("Error during upload");
    $maxSize = 1000000;
    if ($photo_files['profilePhoto']['size'] > $maxSize) throw new Exception("The size of your file is too big");
    $validExtensions = array('jpg', 'jpeg', 'gif', 'png');
    $uploadExtension = strtolower(substr(strrchr($photo_files['profilePhoto']['name'], "."), 1));
    if (in_array($uploadExtension, $validExtensions)) $msg = "Correct extension";
    $folderName = $_SESSION['sessionUserId'];
    $structure = "./private/images/$folderName";
    // $extension = pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION);
    $name = "./private/images/$folderName/profilePhoto.image";
    if (file_exists("$structure/profilePhoto.image")) {
        unlink("$structure/profilePhoto.image");
    }
    if (!mkdir($structure, 0777, true)) {
        throw new Exception("Failed to create a directory");
    }
    $result = move_uploaded_file($photo_files['profilePhoto']['tmp_name'], $name);
    header("Location: index.php?action=profile");
}

function submitCert($pdf_upload)
{
    if ($pdf_upload['pdfCert']['error'] > 0) throw new Exception("Error during upload");
    $maxSize = 10000000;
    if ($pdf_upload['pdfCert']['size'] > $maxSize) throw new Exception("the size of your file is too big");
    $validExtension = 'pdf';
    $uploadExtension = strtolower(substr(strrchr($pdf_upload['pdfCert']['name'], "."), 1));
    if ($uploadExtension == $validExtension) $msg = "Correct extension";
    $folderName = $_SESSION['sessionUserId'];
    $structure = "./private/cert/$folderName";
    // $extension = pathinfo($_FILES['pdfCert']['name'], PATHINFO_EXTENSION);
    $name = "./private/cert/$folderName/cert.pdf";
    if (file_exists("$structure/cert.pdf")) {
        unlink("$structure/cert.pdf");
    };
    if (!mkdir($structure, 0777, true)) {
        throw new Exception("Failed to create a directory");
    };
    $result = move_uploaded_file($pdf_upload['pdfCert']['tmp_name'], $name);
    if ($result) {
        $UserManager = new UserManager();
        $isUpdated = $UserManager->updateCertificate($name);
    }
    header("Location:index.php?action=profile");
}

function logout()
{
    require("./view/logout.php");
}
