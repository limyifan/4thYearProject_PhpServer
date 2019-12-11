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
        echo "User ID: ". $this->id . "<br> Email: " . $this->email . ".\n";
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

            print"Preferences:";
        foreach ($conn->query($sql) as $row) {
            print $row['preference'] . ", ";
        }

    }

}

include 'database.php';
$sql="SELECT * FROM user";


foreach ($conn->query($sql) as $row) {

    $userObject=new User($row['id'] ,$row['email'] ,$row['password'] ,$row['group_id'] ,$row['friend_id'] ,$row['place_interest_id'] ,$row['trip'] );
}

$userObject->printUser();
print"<br>";
$userObject->getPreferences();
//sql to get all user with same preference "SELECT U.*, P.*
//FROM preferences AS p
//    LEFT JOIN user_preferences AS UP ON UP.preference_id  = P.id
//    LEFT JOIN user AS U ON UP.user_id  = U.id
//WHERE P.id = 2"