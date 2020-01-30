<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'database.php';

include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->email = isset($_GET['email']) ? $_GET['email'] : die();
$user->password = isset($_GET['password']) ? $_GET['password'] : die();
//echo $user->email;
//echo $user->password;
// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($user->email) &&
    !empty($user->password)
) {
////
//    // set product property values
//    $user->email = $data->email;
//    $user->password = $data->password;

    // create the product
    if ($user->register()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "User was registered."));
    } // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to register."));
    }

}
// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to register. Data is incomplete."));
}
?>