<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/style.css">
    <script async defer src="https://apis.google.com/js/api.js"></script>
    <meta name="google-signin-client_id" content="935538632306-uidasnjnrrkoh02vpct6ol7eh1mk4uqf.apps.googleusercontent.com">
    <script async defer src="./public/js/gmailLogin.js"></script>
</head>
<body>
    <?php include("header.php");?>
    <?= $content; ?>
    <?php include('footer.php');?>
    <script defer src="../PROJECTBATCH13/public/js/FormCheck.js"></script>
    <script defer src="../PROJECTBATCH13/public/js/main.js"></script>
</body>
</html>


