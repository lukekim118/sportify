<?php
ob_start();
?>
    <div class = "mainContainer">
        <!-- divide the mainContainer in two parts-->
        <div class = "leftContainer">
            <div>
                <h1><i>Sportify ?</i></h1>
                <span>Sportify is an event manager tool for sports lovers !
                Do you want to meet new people to workout together ? Or are you a freelancer coach looking for students ?
                Sportify helps you to create the event that suits your needs ! Chose your sport, the place and the time you want and <i>voila</i> !
                </span>
                <!-- Arthur link to event list page -->
                <a href='index.php?action=events' title='Go to the events page'>Join our events</a>
            </div>
            <?php include("carousel.php");
            ?>
            
        </div> 
        <div class = "rightContainer">
                <div class="guestPart">
                    <h1>Who are you ?</h1>
                    <label class="toggle-control">
                        <input type="checkbox" checked="checked">
                        <span class="control"></span>
                    </label>
                </div>
            <!-- Sumi insert login sign in here -->
        </div>
    </div>

<?php
$content = ob_get_clean();
require("template.php");
?>