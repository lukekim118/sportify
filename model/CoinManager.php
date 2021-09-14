<?php
namespace HTDOCS\projectBatch13\model;
require_once("Manager.php");
// $id=$_SESSION['userid'];

/**
 * BuyCoinManager
 * 
 * 
 */
class CoinManager extends Manager{
    protected $_userid;
    public function __construct()
    {
        parent::__construct();
        $this->_userid=$_SESSION['userid'];
    }
    

    public function changeCoins($newBal){
        $req = $this->_connexion->prepare('UPDATE users SET coins = :newBal WHERE id=:id');
        $req->execute(array(
            'newBal'=>$newBal,
            'id'=> $this->_userid
        ));
    }
    public function viewCoins(){
        $req = $this->_connexion->prepare('SELECT coins from users WHERE id=:id');
        $req->execute(array(
            'id'=> $this->_userid
        ));
        $coins = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $coins;
        }
}