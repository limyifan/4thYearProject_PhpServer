<?php

class User {

    // constructor
    public function __construct($id, $email,$password,$group_id,$friend_id,$place_interest_id,$trip) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->group_id = $group_id;
        $this->friend_id = $friend_id;
        $this->place_interest_id = $place_interest_id;
        $this->trip = $trip;
    }

    public function printUser() {
        return '"User ID":'. $this->id . '," Email":' . $this->email ;
    }

    public function getPreferences()
    {
        $userId= $this->id;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName="tripit";

            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT U.*, P.* FROM user AS U LEFT JOIN user_preferences AS UP ON u.id=UP.user_id LEFT JOIN preferences AS P ON UP.preference_id = P.id WHERE u.id = "."$userId";

        $preferences=array();

        foreach ($conn->query($sql) as $row) {
            array_push($preferences, $row['preference']);
        }

        return '"Preferences":'.json_encode($preferences);
    }

    public function getPlaceTypes()
    {
        $userId= $this->id;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbName="tripit";

        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT U.*, P.* FROM user AS U LEFT JOIN user_preferences AS UP ON u.id=UP.user_id LEFT JOIN preferences AS P ON UP.preference_id = P.id WHERE u.id = "."$userId";

        $places = array();

        foreach ($conn->query($sql) as $row) {
            if ($row['preference']=="History")
            {
                array_push($places, "Museum", "Temple");
            }
           else if ($row['preference']=="Food")
            {
                array_push($places, "Restaurant", "Cafe");
            }

           else if ($row['preference']=="Leisure")
           {
               array_push($places, "bowling_alley", "casino");
           }

           else if ($row['preference']=="Sport")
           {
               array_push($places, "stadium", "bicycle_store");
           }

           else if ($row['preference']=="Arts_Cultures")
           {
               array_push($places, "mosque");
           }

           else if ($row['preference']=="Entertainment")
           {
               array_push($places, "park");
           }

           else if ($row['preference']=="Popular_Places")
           {
               array_push($places, "university");
           }
        }
 return '"Types":'.json_encode($places);

    }
}

include 'database.php';
$sql="SELECT * FROM user where id =2";


foreach ($conn->query($sql) as $row) {

    $userObject=new User($row['id'] ,$row['email'] ,$row['password'] ,$row['group_id'] ,$row['friend_id'] ,$row['place_interest_id'] ,$row['trip'] );
}
$json="{".$userObject->printUser().",".$userObject->getPreferences().",".$userObject->getPlaceTypes()."}";
//$json="{".$userObject->getPreferences()."}";

//sql to get all user with same preference "SELECT U.*, P.*
//FROM preferences AS p
//    LEFT JOIN user_preferences AS UP ON UP.preference_id  = P.id
//    LEFT JOIN user AS U ON UP.user_id  = U.id
//WHERE P.id = 2"

//echo $json;
$obj = json_decode($json);
echo $json;
// Display the value of json object
//print $json["Preferences"];