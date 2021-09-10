    <?php
    ob_start();
    ?>

    <div class = "top>">
        <img src ="./public/img/sportifyLogo.png" id="sportifyLogo">
    </div>
    
    <div class = "mainContainer">
        <!-- xfbvkvkdvdmvddlkvmdvmevdv divide the mainContainer in two parts-->
        <div class = "leftContainer">
        <div>
            Sportify ?
            <img src="./public/img/runningReady.jpeg">
        <!-- carousel  -->
        </div>    
        </div>
        <div class = "rightContainer">
            <input type="radio" name="gender" value="Sign-in">Sign-in
            <input type="radio" name="gender" value="Log-in>"> Log-in
            <!-- Radio Button -->
        </div>
    </div>
    <?php
    include("carousel.php");
    ?>
</div>
    <?php
   $content = ob_get_clean();
   require("template.php");
    ?>






