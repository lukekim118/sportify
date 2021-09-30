<?php
session_start();

require_once("Manager.php");

class UserManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin($email, $password)
    {
        $req = $this->_db->prepare("SELECT * FROM users WHERE email= :email");

        $req->bindParam(":email", $email, PDO::PARAM_STR);

        $req->execute();
        $infos = $req->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $infos["password"])) {
            $_SESSION['sessionUserId'] = $email;
            $_SESSION['sessionPassword'] = $password;
            return $infos;
        } else {
            throw new Exception("There is no user");
        }
        $req->closeCursor();
    }

    public function googleSignUp($email, $givenName, $familyName, $imageURL, $tokenId)
    {

        $firstname = $givenName;
        $lastname =  $familyName;
        $emailAddress = $email;
        $req = $this->_db->prepare("SELECT * FROM users WHERE email= :email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        // $req->bindParam(":password", $password, PDO::PARAM_STR);
        $req->execute();
        $infos = $req->fetchAll(PDO::FETCH_ASSOC);
        if ($infos) {
            throw new Exception("You account is already connected.");
            $req->closeCursor();
        } else {
            $req = $this->_db->prepare("INSERT INTO users(first_name, last_name, email, profile_pic,  is_gmail,date_created_signup) VALUES(:firstname, :lastname, :email, :profile_pic, :gmail, NOW()) ");
            $req->execute(array(
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" =>  $emailAddress,
                "profile_pic" => $imageURL,
                "gmail" => 1, //This value should be change depending on the situation
            ));
            $req->closeCursor();
            return $firstname;
        }
    }

    public function processSignUp($emailAddress, $firstname, $lastname, $newPassword, $rePassword, $phone)
    {
        $req = $this->_db->prepare("SELECT * FROM users WHERE email= :email");
        $req->bindParam(":email", $emailAddress, PDO::PARAM_STR);
        // $req->bindParam(":password", $password, PDO::PARAM_STR);
        $req->execute();
        $infos = $req->fetchAll(PDO::FETCH_ASSOC);
        if ($infos) {
            throw new Exception("This email address has already an account.");
            $req->closeCursor();
        } else {

            $req = $this->_db->prepare("INSERT INTO users(first_name, last_name, email, password, is_gmail,phone,date_created_signup) VALUES(:firstname, :lastname, :email, :password, :gmail, :phone,NOW()) ");
            $req->execute(array(
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $emailAddress,
                "password" => password_hash($newPassword, PASSWORD_DEFAULT),
                "gmail" => 0, //This value should be change depending on the situation
                "phone" => $phone
            ));
            $req->closeCursor();
        }
        return $infos;
    }

    public function displayUserProfile($email)
    {
        $req = $this->_db->prepare("SELECT * FROM users WHERE email='$email'");
        $req->execute();
        $userData = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $userData;
    }

    public function updateInfo($email, $first_name, $last_name, $nickname, $phone, $age, $languages, $sport_interests)

    {
        $req = $this->_db->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, nickname=:nickname, phone=:phone, age=:age, languages=:languages, sport_interests=:sport_interests WHERE email='$email'");
        $req->execute(array(
            "first_name" => $first_name, //TODO htmlspecialchars
            "last_name" => $last_name,
            "nickname" => $nickname,
            "phone" => $phone,
            "age" => $age,
            "languages" => $languages,
            "sport_interests" => $sport_interests
        ));

        $req->closeCursor();
    }

    public function updateCertificate($certificatePath)
    {
        $userEmail = $_SESSION['sessionUserId'];
        $req = $this->_db->prepare("UPDATE users SET certification=:certificate WHERE email='$userEmail'");
        $req->execute(array(
            "certificate" => $certificatePath
        ));


        $req = $this->_db->prepare("UPDATE users SET is_teacher=1 WHERE email='$userEmail'");
        $req->execute();
        // $req->closeCursor();


        $req = $this->_db->prepare("SELECT is_teacher FROM users WHERE email='$userEmail'");
        $req->execute();
        $infos = $req->fetch(PDO::FETCH_ASSOC);

        $req->closeCursor();

        return $infos["is_teacher"];
    }
}
