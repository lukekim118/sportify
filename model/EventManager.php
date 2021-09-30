<?php require_once("Manager.php");

class EventManager extends Manager {
    // protected $_userid;
    public function __construct()
    {
        parent::__construct();
        // $this->_userid=2;
    }
    public function addEvent($description,$start_time,$duration,$indoor_outdoor,$price,$languages,$equipment,$number_of_people,$difficulty){
        $req = $this->_db->prepare('INSERT INTO events(description,start_time,duration,indoor_outdoor,price,languages,equipment,number_of_people,difficulty) VALUES(:description,:start_time,:duration,:indoor_outdoor,:price,:languages,:equipment,:number_of_people,:difficulty)');
        $req->execute(array(
            'description'=>$description,
            'start_time'=>$start_time,
            'duration'=>$duration,
            'indoor_outdoor'=>$indoor_outdoor,
            'price'=>$price,
            'languages'=>$languages,
            'equipment'=>$equipment,
            'number_of_people'=>$number_of_people,
            'difficulty'=>$difficulty
        ));
        $req->closeCursor();
    }
    public function listEvent($id){
        $req=$this->_db->prepare('SELECT * FROM events WHERE id=:id')
        $req->execute(array(
            'id'=>$id
        ));
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        echo "Description : ".$fetch['description']."</br>";
        echo "Start time : ".$fetch['start_time']."</br>";
        echo "Duration : ".$fetch['duration']."</br>";
        echo "Indoor/Outdoor : ".$fetch['indoor_outdoor']."</br>";
        echo "Price : ".$fetch['price']."</br>";
        echo "Language : ".$fetch['languages']."</br>";
        echo "Equipment : ".$fetch['equipment']."</br>";
        echo "Number of People : ".$fetch['number_of_people']."</br>";
        echo "Difficulty : ".$fetch['difficulty']."</br>";
        $req->closeCursor();
    }
    public function removeEvent($id){
        $req = $this->_db->prepare('DELETE * FROM events WHERE id=:id')
        $req->execute(array(
            'id'=>$id
        ));
    }
}