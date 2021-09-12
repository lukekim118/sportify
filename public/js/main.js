function searchEvents() {

    var xhr = new XMLHttpRequest();
    xhr.open('POST', './controller/search.php'); 
    var myform = document.getElementById('form1');
    form = new FormData(myform);
    
    xhr.addEventListener('readystatechange', (e) => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            e.preventDefault();
            document.getElementById('mainDiv').innerHTML = '<span>' + xhr.responseText + '</span>';
        }
    });
    xhr.send(form);
};

function filterEvents() {

    var xhr = new XMLHttpRequest();
    xhr.open('POST', './controller/search.php'); 
    var myform = document.getElementById('form2');
    form = new FormData(myform);
    console.log (form);

    xhr.addEventListener('readystatechange', (e) => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            e.preventDefault();
            console.log (xhr.responseText);
            document.getElementById('mainDiv').innerHTML = '<span>' + xhr.responseText + '</span>';
        }
    });
    xhr.send(form);
};

var applyFilters = document.getElementById('filters');
applyFilters.addEventListener('click', function(e){
    e.preventDefault;
    filterEvents();
});

var searchSubmit = document.getElementById('searchButton');
searchSubmit.addEventListener('click', function(e){
    e.preventDefault;
    searchEvents();
});