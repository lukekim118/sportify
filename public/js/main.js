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
    }

}


if(signUpContainerForm){
    signUpContainerForm.addEventListener("submit", handleSignUp);
}

