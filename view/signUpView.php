<?php $title = "Join with us "; ?>

<?php ob_start(); ?>
<div class="signupContainer">
    <form method="post" action="index.php">
        <input name="action" value="signUpControl" type="hidden">
        <div class="emailContainer">
            <label for="emailAddress">Email address</label>
            <input required id="emailAddress" name="emailAddress" type="email">
        </div>
        <div class="firstnameContainer">
            <label for="firstname">Firstname</label>
            <input required id="firstname" name="firstname" type="text">
        </div>
        <div class="lastnameContainer">
            <label for="lastname">Lastname</label>
            <input required id="lastname" name="lastname" type="text">
        </div>
        <div class="newPasswordContainer">
            <label for="newPassword">Password</label>
            <input required id="newPassword" name="newPassword" type="text">
        </div>
        <div class="rePasswordContainer">
            <label for="rePassword">Re-enter password</label>
            <input required id="rePassword" name="rePassword" type="password">
        </div>
        <div class="phoneContainer">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="text">
        </div>
        <input type="submit" value="Create account">

    </form>
    <form class="logInContainer" action="index.php" method="post">
        <input name="action" value="" type="hidden">
        <input value="login" type="submit">
    </form>

</div>
<?php $content = ob_get_clean(); ?> <?php require("template.php"); ?>