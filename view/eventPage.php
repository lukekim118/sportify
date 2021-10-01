<?php $title = "Event Page"; ?>

<?php ob_start(); ?>
<div id="eventDetail">
    <div class="eventDetailHeader">
        <div id="eventHeaderContent">
            <div id="eventName">
                <h3><?= $event['description']; ?></h3>
            </div>
            <div id="headerContentExtra">
                <p>
                    <img class="hostPhoto" src="">
                    <span>
                        Price:<strong><?= $event['price']; ?></strong>
                    </span>
                </p>
                <button id="attendButton" class="submit">ATTEND</button>
            </div>
        </div>
    </div>

    <div class="eventDetailMainContent">
        <section class="eventDetailDescription">
            <img class="eventImage" src="./public/img/<?= $event['id'] ?>.jpg">
            <p id="descriptionArea"><?= $event['description']; ?></p>
            <form id="commentform">
                <h4>Discussion:</h4>
                <div id="formContent">
                    <img id="authorPhoto" class="hostPhoto">
                    <textarea name="comment" id="comment" rows="1" placeholder="Leave a comment..."></textarea>
                    <button type="submit" class="submit">POST</button>

                </div>

            </form>

        </section>
        <aside class="eventDetailSideContent">

            <div class="eventInfo">

                <div class="eventInfoDetail">
                    <p><i class="fa fa-calendar" aria-hidden="true">><?= $event['start_time']; ?></i></p>
                </div>
                <div class="eventInfoDetail">
                    <p>Guest Attending: <?= $event['number_of_people']; ?></p>
                </div>
                <div class="eventInfoDetail">
                    <p>Duration: <?= $event['duration']; ?></p>
                </div>
                <div class="eventInfoDetail">
                    <p>Indoor/outdoor: <?= $event['duration']; ?></p>
                </div>
                <div class="eventInfoDetail">
                    <p>Indoor/outdoor: <?= $event['indoor_outdoor']; ?></p>
                </div>
                <div class="eventInfoDetail">
                    <p>language(s): <?= $event['languages']; ?></p>
                </div>
                <div class="eventInfoDetail">
                    <p>equipment needed: <?= $event['equipment']; ?></p>
                </div>
                <div class="eventInfoDetail">
                    <p>Difficulty: <?= $event['difficulty']; ?></p>
                </div>
            </div>
        </aside>
    </div>
</div>



<?php $content = ob_get_clean();
require("template.php") ?>