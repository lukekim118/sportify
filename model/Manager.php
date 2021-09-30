<?php

class Manager
{
    protected $_db;
    protected function __construct()
    {
        $this->_db = new PDO("mysql:host=localhost;dbname=batch13;charset=utf8", "root", "");
    }
}
