<?php
require_once("Manager.php");

class EventManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showAllEvents()
    {
        $req = $this->_db->prepare("SELECT * FROM events");
        $req->execute();
        $events = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $events;
    }

    public function searchEvents($search)
    {
        $req = $this->_db->prepare("SELECT * FROM events WHERE description LIKE '%$search%'");
        $req->execute();
        $events = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $events;
    }

    public function filterEvents($price, $date, $indoor, $language, $noequipment, $duration)
    {
        switch ($price) {
            case 'lowerprice':
                $price = 'price <=10';
                break;
            case 'mediumprice':
                $price = 'price >=10 AND price <=20';
                break;
            case 'higherprice':
                $price = 'price >=20';
                break;
            default:
                $price = 'price > 0';
                break;
        }
        switch ($date) {
            case 'thisweek':
                $date = ' AND start_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), interval 7 day)';
                break;
            case 'thismonth':
                $date = ' AND start_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), interval 1 month)';
                break;
            case 'nextmonths':
                $date = ' AND start_time BETWEEN CURDATE() AND DATE_ADD(CURDATE(), interval 3 month)';
                break;
            case 'anytime':
                $date = '';
                break;
            case 'pastevents':
                $date = ' AND start_time BETWEEN CURDATE() AND DATE_SUB(CURDATE(), interval 12 month)';
                break;
            default:
                $date = '';
                break;
        }
        switch ($indoor) {
            case 'indoor':
                $indoor = ' AND indoor_outdoor="indoor"';
                break;
            case 'outdoor':
                $indoor = ' AND indoor_outdoor="outdoor"';
                break;
            default:
                $indoor = '';
        }
        switch ($language) {
            case 'other':
                $language = '';
                break;
            default:
                $selectedLanguage = $_POST['language'];
                $language = " AND languages='$selectedLanguage'";
                break;
        }
        switch ($duration) {
            case '1hour':
                $duration = " AND duration <=1";
                break;
            case '2hour':
                $duration = " AND duration >1 AND duration <=2";
                break;
            case '3hour':
                $duration = " AND duration >2 AND duration <=3";
                break;
            case '4hour':
                $duration = " AND duration >3";
                break;
            case 'any':
                $duration = " AND duration > 0";
                break;
            default:
                $duration = '';
                break;
        }

        if ($noequipment == 0) {
            $noequipment = '';
        } else {
            $noequipment = ' AND equipment="no"';
        }
        $query =    "SELECT * FROM events WHERE "
            . $price
            . $date
            . $indoor
            . $language
            . $noequipment
            . $duration;
        // echo $query;
        $req = $this->_db->prepare($query);
        $req->execute();
        $events = $req->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }

    public function addEvent($description, $start_time, $duration, $indoor_outdoor, $price, $languages, $equipment, $number_of_people, $difficulty)
    {
        $req = $this->_db->prepare('INSERT INTO events(description,start_time,duration,indoor_outdoor,price,languages,equipment,number_of_people,difficulty) VALUES(:description,:start_time,:duration,:indoor_outdoor,:price,:languages,:equipment,:number_of_people,:difficulty)');
        $req->execute(array(
            'description' => $description,
            'start_time' => $start_time,
            'duration' => $duration,
            'indoor_outdoor' => $indoor_outdoor,
            'price' => $price,
            'languages' => $languages,
            'equipment' => $equipment,
            'number_of_people' => $number_of_people,
            'difficulty' => $difficulty
        ));
        $req->closeCursor();
    }

    public function listEvent($id)
    {
        $req = $this->_db->prepare('SELECT * FROM events WHERE id=:id');
        $req->execute(array(
            'id' => $id
        ));
        $fetch = $req->fetch(PDO::FETCH_ASSOC);
        echo "Description : " . $fetch['description'] . "</br>";
        echo "Start time : " . $fetch['start_time'] . "</br>";
        echo "Duration : " . $fetch['duration'] . "</br>";
        echo "Indoor/Outdoor : " . $fetch['indoor_outdoor'] . "</br>";
        echo "Price : " . $fetch['price'] . "</br>";
        echo "Language : " . $fetch['languages'] . "</br>";
        echo "Equipment : " . $fetch['equipment'] . "</br>";
        echo "Number of People : " . $fetch['number_of_people'] . "</br>";
        echo "Difficulty : " . $fetch['difficulty'] . "</br>";
        $req->closeCursor();
    }
    public function removeEvent($id)
    {
        $req = $this->_db->prepare('DELETE * FROM events WHERE id=:id');
        $req->execute(array(
            'id' => $id
        ));
    }
}
