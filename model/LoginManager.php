<?php
require_once("Manager.php");

class loginManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin($email, $password)
    {
        $req = $this->_db->prepare("SELECT * FROM users WHERE email= :email AND password= :password");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->bindParam(":password", $password, PDO::PARAM_STR);
        $req->execute();
        $infos = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $infos;
    }
}
