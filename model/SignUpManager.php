<?php
require_once("Manager.php");

class SignUpManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
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
}
