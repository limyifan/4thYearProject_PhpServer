<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $user_arr=array();
    $user_arr["records"]=array();

       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $product_item=array(
            "id" => $id,
            "email" => $email,
            "password" => $password
        );

        array_push($user_arr["records"], $product_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($user_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}