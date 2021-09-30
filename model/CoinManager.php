<?php
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
        $this->_userid=2;
    }
    

    public function changeCoins($newBal){
        echo $newBal;
        $req = $this->_db->prepare('UPDATE users SET coins = :newBal WHERE id=:id');
        $req->execute(array(
            'newBal'=>$newBal,
            'id'=> $this->_userid
        ));
    }
    public function viewCoins(){
        $req = $this->_db->prepare('SELECT coins from users WHERE id=:id');
        $req->execute(array(
            'id'=> $this->_userid
        ));
        $coins = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $coins['coins'];
        }
    public function transSpent($coinsSpent){
        $req = $this->_db->prepare('SELECT id from events WHERE user_id=:user_id');
        $req->execute(array(
            'user_id'=>$this->_userid
        ));
        $fetch= $req->fetch(PDO::FETCH_ASSOC);
        $eventid=$fetch['id'];
        $req = $this->_db->prepare('SELECT email from users WHERE id=:userid');
        $req->execute(array(
            'userid'=>$this->_userid
        ));
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        $email = $fetch['email'];
        $req = $this->_db->prepare('INSERT INTO transactions(user_id,email,event_id,coinsSpent,date) VALUES(:user_id,:email,:event_id,:coinsSpent,NOW())');
        $req->execute(array(
            'user_id'=>$this->_userid,
            'email'=>$email,
            'event_id'=>$eventid,
            'coinsSpent'=>$coinsSpent
        ));
        $req->closeCursor();
        }
    public function transAdd($coinsAdded){
        $req = $this->_db->prepare('SELECT id from events WHERE user_id=:user_id');
        $req->execute(array(
            'user_id'=>$this->_userid
        ));
        $fetch= $req->fetch(PDO::FETCH_ASSOC);
        $eventid=$fetch['id'];
        $req = $this->_db->prepare('SELECT email from users WHERE id=:userid');
        $req->execute(array(
            'userid'=>$this->_userid
        ));
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        $email = $fetch['email'];
        $req = $this->_db->prepare('INSERT INTO transactions(user_id,email,event_id,coinsAdded,date) VALUES(:user_id,:email,:event_id,:coinsAdded,NOW())');
        $req->execute(array(
            'user_id'=>$this->_userid,
            'email'=>$email,
            'event_id'=>$eventid,
            'coinsAdded'=>$coinsAdded
        ));
        $req->closeCursor();
        }
        public function transRefund($coinsRefunded){
            echo $coinsRefunded;
            $req = $this->_db->prepare('SELECT id from events WHERE user_id=:user_id');
            $req->execute(array(
                'user_id'=>$this->_userid
            ));
            $fetch= $req->fetch(PDO::FETCH_ASSOC);
            $eventid=$fetch['id'];
            $req = $this->_db->prepare('SELECT email from users WHERE id=:userid');
            $req->execute(array(
                'userid'=>$this->_userid
            ));
            $fetch = $req->fetch(PDO::FETCH_ASSOC);
            $email = $fetch['email'];
            $req = $this->_db->prepare('INSERT INTO transactions(user_id,event_id,coinsRefunded,date) VALUES(:user_id,:event_id,:coinsRefunded,NOW())');
            $req->execute(array(
                'user_id'=>$this->_userid,
                'event_id'=>$eventid,
                'coinsRefunded'=>$coinsRefunded
            ));
            $req->closeCursor();
            }

    public function showSpent(){
        $req = $this->_db->prepare('SELECT id from events WHERE user_id=:user_id ');
        $req->execute(array(
            'user_id'=>$this->_userid
        ));
        $fetch= $req->fetch(PDO::FETCH_ASSOC);
        $eventid=$fetch['id'];
        $req = $this->_db->prepare('SELECT * FROM transactions WHERE user_id=:user_id AND event_id=:event_id ORDER BY id DESC');
        $req->execute(array(
            'user_id'=>$this->_userid,
            'event_id'=>$eventid
        ));
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $fetch['coinsSpent'];
    }
    // public function showTransDet(){
    //     $req = $this->_db->prepare('SELECT * FROM transactions')
    // }
}