<?php
require_once("Manager.php");

class ProfileManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function showProfile()
    {
        $req = $this->_db->prepare("SELECT * FROM users WHERE email='sampleemail@gmail.com'");
        $req->execute();
        $userData = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $userData;
    }

}