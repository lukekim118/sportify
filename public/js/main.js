var editInformation = document.querySelector("#editInfo");
editInformation.addEventListener("click", function () {
  let allInput = document.querySelectorAll(".editProfile");
  let allInfo = document.querySelectorAll(".info");
  if (editInformation.textContent == "Edit") {
    for (let i = 0; i < allInfo.length; i++) {
      allInput[i].setAttribute("value", allInfo[i].textContent);
      allInput[i].setAttribute("type", "text");
      allInfo[i].hidden = true;
    }
    editInformation.textContent = "Save";
  } else {
    let fieldName = [
      "email",
      "first_name",
      "last_name",
      "nickname",
      "phone",
      "age",
      "languages",
      "sport_interests",
    ];
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?action=editprofileinfo");
    let form = new FormData();
    for (let i = 0; i < allInput.length; i++) {
      form.append(fieldName[i], allInput[i].value);
    }
    xhr.addEventListener("readystatechange", (e) => {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        e.preventDefault();
      }
    });
    xhr.send(form);
    for (let i = 0; i < allInput.length; i++) {
      allInfo[i].textContent = allInput[i].value;
      allInput[i].setAttribute("type", "hidden");
      allInfo[i].hidden = false;
    }
    editInformation.textContent = "Edit";
  }
});

const signUpContainerForm = document.querySelector(".signupContainer form");
console.log(signUpContainerForm);

const handleSignUp = (e) => {
  e.preventDefault();
  const signUpMandCheck = new FormCheck(
    email,
    firstName,
    lastName,
    newPassword,
    rePassword,
    phone,
  );
  const emailTrue = signUpMandCheck.emailCheck();
  const firstNameTrue = signUpMandCheck.firstNameCheck();
  const lastNameTrue = signUpMandCheck.lastNameCheck();
  const newPasswordTrue = signUpMandCheck.newPasswordCheck();
  const rePasswordTrue = signUpMandCheck.rePasswordCheck();
  if (
    emailTrue &&
    firstNameTrue &&
    lastNameTrue &&
    newPasswordTrue &&
    rePasswordTrue
  ) {
    signUpContainerForm.submit();
    console.log("It is submitted");
  }
};

if (signUpContainerForm) {
  signUpContainerForm.addEventListener("submit", handleSignUp);
}
