function searchEvents() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?action=search");
  var myform = document.getElementById("form1");
  form = new FormData(myform);
  xhr.addEventListener("readystatechange", (e) => {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      e.preventDefault();
      document.getElementById("mainDiv").innerHTML = xhr.responseText;
      document.getElementById("searchTextInput").value = "";
    }
  });
  xhr.send(form);
}

function filterEvents() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?action=filter");
  var myform = document.getElementById("form2");
  form = new FormData(myform);
  xhr.addEventListener("readystatechange", (e) => {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      e.preventDefault();
      document.getElementById("mainDiv").innerHTML = xhr.responseText;
      document.getElementById("searchTextInput").value = "";
    }
  });
  xhr.send(form);
}

var applyFilters = document.getElementById("filters");
applyFilters.addEventListener("click", function (e) {
  filterEvents();
});

var searchSubmit = document.getElementById("searchButton");
searchSubmit.addEventListener("click", function (e) {
  var myform = document.getElementById("form1");
  myform.addEventListener("submit", function (e) {
    e.preventDefault();
  });
  searchEvents();
});
