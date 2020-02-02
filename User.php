<?php

class User {


    private $conn;
    private $table_name = "user";

    public $id;
    public $email;
    public $password;
    public $group_id;
    public $friend_id;
    public $place_interest_id;
    public $trip;
    public $preference= array();
    public $place= array();
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){

        // select all query
        $query = "SELECT `id`,`email`,`password` FROM `user`";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function register(){

        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "  SET  email=:email, password=:password";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->email=$this->email;
        $this->password=$this->password;

        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;


    }
    public function getUser() {
        include_once 'database.php';
        $database = new Database();
        $conn= $database->getConnection();
        $sql="SELECT * FROM user where id =?";

        $stmt = $conn->prepare( $sql );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->id = $row['id'];
            $this->email = $row['email'];
            $this->password = $row['password'];
//            $this->group_id = "group_id";
//            $this->friend_id = "friend_id";
//            $this->place_interest_id = "place_interest_id";
//            $this->trip = "trip";

    }

     function getPreference()
    {
        $sql="SELECT U.*, P.* FROM user AS U LEFT JOIN user_preferences AS UP ON u.id=UP.user_id LEFT JOIN preferences AS P ON UP.preference_id = P.id WHERE u.id =?";

        include_once 'database.php';
        $database = new Database();
        $conn= $database->getConnection();

        $stmt = $conn->prepare( $sql );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        // get retrieved row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
       {
            array_push( $this->preference,  $row['preference']);
        }
    }

    public function getPlaceType()
    {
        $sql="SELECT U.*, P.* FROM user AS U LEFT JOIN user_preferences AS UP ON u.id=UP.user_id LEFT JOIN preferences AS P ON UP.preference_id = P.id WHERE u.id =?";

        include_once 'database.php';
        $database = new Database();
        $conn= $database->getConnection();

        $stmt = $conn->prepare( $sql );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        // get retrieved row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {

            if ($row['preference']=="History")
            {
                array_push($this->place, "Museum", "Temple");
            }

           else if ($row['preference']=="Food")
            {
                array_push($this->place, "Restaurant", "Cafe");
            }

           else if ($row['preference']=="Leisure")
           {
               array_push($this->place, "bowling_alley", "casino");
           }

           else if ($row['preference']=="Sport")
           {
               array_push($this->place, "stadium", "bicycle_store");
           }

           else if ($row['preference']=="Arts_Cultures")
           {
               array_push($this->place, "mosque");
           }

           else if ($row['preference']=="Entertainment")
           {
               array_push($this->place, "park");
           }

           else if ($row['preference']=="Popular_Places")
           {
               array_push($this->place, "university");
           }
        }

    }
}
//
//include_once 'database.php';
//$database = new Database();
//$db = $database->getConnection();
//$sql="SELECT * FROM user where id =2";
//
//
//foreach ($db->query($sql) as $row) {
//
//    $userObject=new User($row['id'] ,$row['email'] ,$row['password'] ,$row['group_id'] ,$row['friend_id'] ,$row['place_interest_id'] ,$row['trip'] );
//}
//$json="{".$userObject->getUser().",".$userObject->getPreferences().",".$userObject->getPlaceTypes()."}";
////$json="{".$userObject->getPreferences()."}";
//
////sql to get all user with same preference "SELECT U.*, P.*
////FROM preferences AS p
////    LEFT JOIN user_preferences AS UP ON UP.preference_id  = P.id
////    LEFT JOIN user AS U ON UP.user_id  = U.id
////WHERE P.id = 2"
//
////echo $json;
//$obj = json_decode($json);
//echo $json;
//// Display the value of json object
////print $json["Preferences"];