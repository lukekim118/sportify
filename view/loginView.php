<?php $title = "Sign-in"; ?>

<?php ob_start(); ?>
<form class="log__in--container" action="index.php" method="post">
    <input name="action" value="userPage" type="hidden">
    <h2>Sign-in</h2>
    <div class="email__box">
        <label for="email">Email </label>
        <input id="email" type="text" name="email" />
    </div>
    <div class=" password__box">
        <label for="password">Password </label>
        <input id="password" type="text" name="password" />
    </div>
    <input value="login" type="submit">
</form>
<form class="sign__in--container" action="./view/signUpView.php" method="post">
    <!-- <label for="sign__in">create your account</label> -->
    <input value="create your account" type="submit">

</form>


<?php $content = ob_get_clean(); ?>
<?php require("template.php"); ?>