<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once 'User.php';

    include_once 'database.php';
    $database = new Database();
    $db = $database->getConnection();

    $sql="SELECT U.*, P.* FROM user AS U LEFT JOIN user_preferences AS UP ON u.id=UP.user_id LEFT JOIN preferences AS P ON UP.preference_id = P.id WHERE u.id =? ";
    $stmt = $this->conn->prepare( $sql );
    $stmt->bindParam(1, $this->id);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->name = $row['preference'];
//        $preferences=array();
//
//        foreach ($db->query($sql) as $row) {
//            array_push($preferences, $row['preference']);
//        }
//
//        echo '"Preferences":'.json_encode($preferences);
