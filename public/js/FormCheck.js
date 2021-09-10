const email = document.querySelector(".emailContainer input");
const firstName = document.querySelector(".firstnameContainer input");
const lastName = document.querySelector(".lastnameContainer input");
const newPassword = document.querySelector(".newPasswordContainer input");
const rePassword = document.querySelector(".rePasswordContainer input");
const phone = document.querySelector(".phoneContainer input");


class FormCheck {
    constructor(email,firstName,lastName,newPassword,rePassword){
        this.email = email.value;
        this.firstName =firstName.value;
        this.lastName = lastName.value;
        this.newPassword = newPassword.value;
        this.rePassword = rePassword.value;
        this.phone = phone.value;
    
    }
    emailCheck(){
        const REGEX_EMAIL = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        // const matchedRegex =this.email.match(regex);
        // console.log(matchedRegex);
        let errorHandle = "";
        const spanError = document.createElement("span");
        const emailContainer = document.querySelector(".emailContainer");


        if (REGEX_EMAIL.test(this.email)) {
            spanError.innerHTML="";
            emailContainer.appendChild(spanError);
            return true;
        }
        else {
            errorHandle="Please put a valid email address";
            emailContainer.appendChild(spanError);
            return false;
        }
    }

    firstNameCheck(){
        const upperLetter = this.firstName.slice(0,1).toUpperCase();
        const lowerLetter = this.firstName.slice(1).toLowerCase();
        const concatLetter = upperLetter.concat("",lowerLetter);
        if(concatLetter){
            return true;
        }
        else{
            return false;
        }
        
    }
    lastNameCheck(){
        const upperLetter = this.lastName.slice(0,1).toUpperCase();
        const lowerLetter = this.lastName.slice(1).toLowerCase();
        const concatLetter = upperLetter.concat("",lowerLetter);
        if(concatLetter) {
            return true;
        }
        else{
            return false;
        }
       
    }
    newPasswordCheck(){
        const REGEX_PASSWORD = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{7,})/;
        // console.log(this.newPassword);
        // console.log(REGEX_PASSWORD);
        // console.log(REGEX_PASSWORD.test(this.newPassword));
        // console.log(this.newPassword.match(REGEX_PASSWORD));
        if(REGEX_PASSWORD.test(this.newPassword)){
            return true;
        }
        else{
            console.log("Something wrong");
            return false;
        }
     
    }
    rePasswordCheck(){
        const REGEX_PASSWORD = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{7,})/;
        if(REGEX_PASSWORD.test(this.rePassword) && this.newPassword ===this.rePassword){
            return true;
        }
        else{
            console.log("Please confirm the password again");
            return false;
        }

    }
    
};


