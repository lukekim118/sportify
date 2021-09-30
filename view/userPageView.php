<?php $title = "Profile"; ?>
<?php $style = "profileView.css" ?>
<?php ob_start(); ?>

<div id='wrapper'>
    <div id='profile'>
        <h1>Profile</h1>
        <div id='profilePicDiv'>
            <img id='profilePic' alt='profilephoto' name='profilephoto' src='./private/images/<?= $_SESSION['sessionUserId'] ?>/profilePhoto.image' />
            <form action='index.php' method='POST' enctype='multipart/form-data'>
                <input name="action" value="uploadphoto" type="hidden">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <input type='file' accept='image/*' id='file' name='profilePhoto'>
                <label class='buttons' id='sendPhoto' for='file'>Choose new image...</label>
                <input class='buttons' type="submit" name="submitProfilePic" value="Select">
            </form>
        </div>

    </div>
    <div id='alldata'>
        <button class='buttons' id='editInfo' value="edit">Edit</button>
        <div class='userData'>
            <p>E-mail / Login : </p>
            <p class='info' id='email'><?= $userInfos['email'] ?></p>
            <input type='hidden' id="readonly" class='editProfile' readonly />
        </div>
        <div class='userData'>
            <p>First Name : </p>
            <p class="info"><?= $userInfos["first_name"] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Last Name : </p>
            <p class="info"><?= $userInfos['last_name'] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Nickname : </p>
            <p class="info"><?= $userInfos['nickname'] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Phone Number : </p>
            <p class="info"><?= $userInfos['phone'] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Age : </p>
            <p class="info"><?= $userInfos['age'] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Languages : </p>
            <p class="info"><?= $userInfos['languages'] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Sport Interest : </p>
            <p class="info"><?= $userInfos['sport_interests'] ?></p>
            <input type='hidden' class='editProfile' />
        </div>
        <div class='userData'>
            <p>Date joined : </p>
            <p><?= $userInfos['date_created_signup'] ?></p>
            <input type='hidden' />
        </div>
        <div class='userData'>
            <p>Events Attending : </p>
            <p><?= $userInfos['events_attending'] ?></p>
            <input type='hidden' />
        </div>
        <div class='userData'>
            <p>Balance : </p>
            <p><?= $userInfos['balance'] ?></p>
            <input type='hidden' />
            <button class='buttons'>Buy coins</button>
        </div>
        <div id='teacherDiv' class='userData'>
            <?php
            if ($userInfos['is_teacher'] == 1) {
                include('teacherPage.php');
            } else {
                include('userBecomesTeacher.php');
            };

            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("template.php");
