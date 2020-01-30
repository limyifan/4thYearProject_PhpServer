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

// prepare product object
$user = new User($db);
if( isset($_GET['id'])) {
// set ID property of record to read
$user->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
    $user->getUser();

    if ($user->email != null) {
        // create array
        $user_arr = array(
            "id" => $user->id,
            "email" => $user->email,
            "password" => $user->password

        );

        // set response code - 200 OK
        http_response_code(200);

        // make it json format
        echo json_encode($user_arr);
    } else {
        // set response code - 404 Not found
        http_response_code(404);

        // tell the user product does not exist
        echo json_encode(array("message" => "User does not exist."));
    }
}
else
{
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
        $user_arr["Users"]=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $product_item=array(
                "id" => $id,
                "email" => $email,
                "password" => $password
            );

            array_push($user_arr["Users"], $product_item);
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
            array("message" => "No user found.")
        );
    }
}