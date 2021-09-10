function filterEvents() {
    var xhr = new XMLHttpRequest();
    var price = document.getElementById('price').value;
    alert (price);
    var link = '../model/search.php';
    xhr.open('POST', link);
    xhr.addEventListener('readystatechange', (e)=> {
        e.preventDefault();
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById('mainDiv').innerHTML = '<span>' + xhr.responseText + '</span>';
        }
    });
        xhr.send(null);
}

var applyFilters = document.getElementById('filter');
applyFilters.addEventListener('click', filterEvents());