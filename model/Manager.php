<?php

class Manager
{
    protected $_db;
    //If user is different , do not use constant, argument is better ... 
    protected function __construct()
    {

        $this->_db = new PDO("mysql:host=localhost;dbname=batch13-project;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
