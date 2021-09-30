<?php $title = "Event Page"; ?>

<?php ob_start(); ?>

<?php echo ($_GET['eventid']) ?>

<div id="eventDetail">
    <div class="eventDetailHeader">
        <div id="eventHeaderContent">
            <div id="eventName">
                <h3>Get Strong And Fit</h3>
            </div>
            <div id="headerContentExtra">
                <p>
                    <img class="hostPhoto" src="">
                    <span>
                        Hosted by:<strong>Steven</strong>
                    </span>
                </p>
                <button id="attendButton" class="submit">ATTEND</button>

            </div>

        </div>

    </div>

    <div class="eventDetailMainContent">
        <section class="eventDetailDescription">
            <img class="eventImage" src="https://images.says.com/uploads/story/cover_image/32961/40b9.jpg">
            <p id="descriptionArea">Intense workout for getting lean and building muscles </p>
            <form id="commentform">
                <h4>Discussion:</h4>
                <div id="formContent">
                    <img id="authorPhoto" class="hostPhoto" src="">
                    <textarea name="comment" id="comment" rows="1" placeholder="Leave a comment..."></textarea>
                    <button type="submit" class="submit">POST</button>

                </div>

            </form>

        </section>
        <aside class="eventDetailSideContent">

            <div class="eventInfo">

                <div class="eventInfoDetail">
                    <p><i class="fa fa-calendar" aria-hidden="true">Sat, Sep 18, 1:00pm</i></p>
                </div>
                <div class="eventInfoDetail">
                    <p>Seoul Korea</p>
                </div>
                <div class="eventInfoDetail">
                    <p>Guest Limit: 10</p>
                </div>
                <div class="eventInfoDetail">
                    <p>Guest Attending: 6</p>
                </div>
            </div>
            <div class="mapDisplay">
                <h5>Map:</h5>
                <div id="mapContainer">
                    <div id="map" style=""></div>

                </div>
            </div>
        </aside>

    </div>
    <h5>More Events Like This One:</h5>
    <div id="eventPreviews"></div>
    <a id="seeAllEvents" href="">See all</a>

</div>



<?php $content = ob_get_clean();
require("template.php") ?>