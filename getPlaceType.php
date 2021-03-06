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

// set ID property of record to read
$user->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$user->getPlaceType();

if($user->place!=null){
    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($user->place);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "User does not exist."));
}