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

const signUpContainerForm = document.querySelector(".signupContainer form");
console.log(signUpContainerForm);

const handleSignUp = (e) =>{
    e.preventDefault();
    const signUpMandCheck = new FormCheck(email,firstName,lastName,newPassword,rePassword,phone);
    const emailTrue = signUpMandCheck.emailCheck();
    const firstNameTrue = signUpMandCheck.firstNameCheck();
    const lastNameTrue =  signUpMandCheck.lastNameCheck();
    const newPasswordTrue = signUpMandCheck.newPasswordCheck();
    const rePasswordTrue =signUpMandCheck.rePasswordCheck();
    if(emailTrue && firstNameTrue && lastNameTrue && newPasswordTrue && rePasswordTrue ){
        signUpContainerForm.submit();
        console.log("It is submitted");
    };
};

if(signUpContainerForm){
    signUpContainerForm.addEventListener("submit", handleSignUp);
};