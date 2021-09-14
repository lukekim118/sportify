<?php
class Manager {
        
    /**
     * _connexion
     *
     * @var PDOStatement
     */
    protected $_connexion;
    const DBNAME = "batch13";
    const LOGIN = "root";
    const PWD = "";
    
    /**
     * __construct
     *
     * @return void
     */
    protected function __construct () {
        $this->_connexion = new PDO("mysql:host=localhost;dbname=".self::DBNAME.";charset=utf8", self::LOGIN , self::PWD );
    }
}