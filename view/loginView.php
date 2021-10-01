<?php $title = "Sign-in"; ?>

<?php ob_start(); ?>
<form class="logInContainer" action="index.php" method="post">
    <input name="action" value="userpage" type="hidden">
    <h2>Sign-in</h2>
    <div class="emailBox">
        <label for="email">Email </label>
        <input id="email" type="text" name="email" />
    </div>
    <div class=" passwordBox">
        <label for="password">Password </label>
        <input id="password" type="text" name="password" />
    </div>
    <input value="Login" type="submit">
</form>
<form class="signInContainer" action="index.php" method="post">
    <input name="action" value="signup" type="hidden">
    <!-- <label for="sign__in">create your account</label> -->
    <input value="Create Account" type="submit">
</form>

<div class="g-signin2" data-onsuccess="onSignIn"></div>
<a href="#" onclick="signOut();">Sign out</a>
<!-- <div id="auth-status" style="display: inline; padding-left: 25px"></div> -->
<hr />
<script src="https://apis.google.com/js/platform.js" async defer></script>


<?php $content = ob_get_clean(); ?>
<?php require("template.php"); ?>