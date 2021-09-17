

let profile;
function onSignIn(googleUser) {
    profile = googleUser.getBasicProfile();
    console.log(profile);
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    // const profileId = profile.getId();
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    // return profile;
    var id_token = googleUser.getAuthResponse().id_token;;
    console.log("Token id 👉" + id_token);
    const email = profile.getEmail();
    const givenName = profile.getGivenName();
    const familyName = profile.getFamilyName();
    const imageURL = profile.getImageUrl();



    var xhr = new XMLHttpRequest();
    xhr.open('POST', `http://localhost/projectBatch13/index.php`);
    let data = new FormData();
    data.append("action", "userPage");
    data.append("email", email);
    data.append("givenName", givenName);
    data.append("familyName", familyName);
    data.append("imageURL", imageURL);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      console.log('Signed in as: ' + xhr.responseText);
    };
    xhr.send(data);
}


function signOut() {
  // const userExist = onSignIn()

  if(profile) {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  } 
  else console.log("user already signed out");
  

}