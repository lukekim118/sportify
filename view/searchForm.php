<div id='forms'>
    <h1>EVENTS</h1><br>
    <form id='form1' class='forms' type='submit'>
        <label for='name'>Find an event by name : </label>
        <input id='searchTextInput' name='search' type='text' autocomplete="off"></input>
        <input id='searchButton' class='buttons' name='searchButton' value='Search' type='button'></input><br>
    </form><br><br>
    <form id='form2' class='forms' type='submit'>
        <label>Filters : </label>
        <select class='dropdown' id='price' name='price'>
            <option value='lowerprice'>Under $10</option>
            <option value='mediumprice'>$10-$20</option>
            <option value='higherprice'>$20 and up</option>
            <option value='anyprice' selected>Any Price</option>
        </select>
        <select class='dropdown' name='date'>
            <option value='thisweek'>This week</option>
            <option value='thismonth'>This month</option>
            <option value='nextmonths'>Next 3 months</option>
            <option value='pastevents'>Past Events</option>
            <option value='anytime' selected>All Events</option>
        </select>
        <select class='dropdown' name='indoor'>
            <option value='indoor'>Indoor</option>
            <option value='outdoor'>Outdoor</option>
            <option value='any' selected>Indoor or outdoor</option>
        </select><br><br>
        <select class='dropdown' name='language'>
            <option value='english'>English</option>
            <option value='korean'>Korean</option>
            <option value='chinese'>Chinese</option>
            <option value='other' selected>Any language</option>
        </select>
        <select class='dropdown' name='duration'>
            <option value='1hour'>Under 1 hour</option>
            <option value='2hour'>1-2 hours</option>
            <option value='3hour'>2-3 hours</option>
            <option value='4hour'>4 hours or longer</option>
            <option value='any' selected>Any duration</option>
        </select><br><br>
        <input type="hidden" value='0' name="noequipment">
        <input type="checkbox" value='1' name="noequipment">
        <label for="noequipment">No equipment needed</label><br><br>
        <input name='applyFilters' type='hidden'></input>
        <input id='filters' class='buttons' name='filters' value='Apply filters' type='button'></input><br>
    </form>
</div>