<?php $title="Search";?>

<?php ob_start();?>

<h1>UPCOMING EVENTS</h1><br>
    <form id='form1' class='forms' method='POST' action='./model/search.php' type='submit'>
        <label for='name'>Find an event by name : </label>
        <input name='search' type='text' autocomplete="off"></input>
        <input id='searchButton' class='buttons' name='searchButton' value='Search' type='button'></input><br>
    </form><br><br>
    <form id='form2' class='forms' method='POST' action='./model/search.php' type='submit'>
        <label>Filters : </label>
        <select id='price' name='price'>
        <option value='lowerprice'>Under $10</option>
        <option value='mediumprice'>$10-$20</option>
        <option value='higherprice'>$20 and up</option>
        <option value='anyprice' selected>Any Price</option>
        </select>
        <select name='date'>
        <option value='thisweek'>This week</option>
        <option value='thismonth'>This month</option>
        <option value='nextmonths'>Next 3 months</option>
        <option value='anytime' selected>Anytime</option>
        </select>
        <select name='indoor'>
        <option value='indoor'>Indoor</option>
        <option value='outdoor'>Outdoor</option>
        <option value='any' selected>Indoor/outdoor</option>
        </select>
        <select name='language'>
        <option value='english'>English</option>
        <option value='korean'>Korean</option>
        <option value='chinese'>Chinese</option>
        <option value='other' selected>Any language</option>
        </select><br><br>
        <input type="checkbox" name="noequipment">
        <label for="checkbox">No equipment needed</label>
        <input type="checkbox" name="duration">
        <label for="duration">Not longer then 2 hours</label>
        <input name='applyFilters' type='hidden'></input>    
        <input id='filters' class='buttons' name='filters' value='Apply filters' type='button'></input><br>
    </form> 
    <script src = './public/js/main.js '></script>
<?php $content = ob_get_clean();?>
<?php require("template.php");