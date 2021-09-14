<?php
require_once("Manager.php");

class LoginManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin($email, $password)
    {

        $req = $this->_db->prepare("SELECT * FROM users WHERE email= :email");

        $req->bindParam(":email", $email, PDO::PARAM_STR);
        // $req->bindParam(":password", $password, PDO::PARAM_STR);
        // $password2 = password_verify($password, $req["password"]);
        $req->execute();
        // $infos = $req->fetchAll(PDO::FETCH_ASSOC);
        $infos = $req->fetch(PDO::FETCH_ASSOC);
        // $email = $infos["email"];
        echo $email;


        if (password_verify($password, $infos["password"])) {
            return $infos;
        } else {
            throw new Exception("There is no user");
        }
        $req->closeCursor();
    }
}
