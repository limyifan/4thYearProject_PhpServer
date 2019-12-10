<?php 

include 'Place.php';

$location = "Dundalk";

//fields
$fields = array ("place_id","name","geometry");
$api = "AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";

$testURL = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=53.9979451,-6.405957&radius=100&type=restaurant&fields=" . $fields[0] . ",". $fields[2] . "," . $fields[1] . "&key=" . $api;
$url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=". $location . "&inputtype=textquery&fields=" . $fields[0] . ",". $fields[2] . "," . $fields[1] . "&key="  . $api;



//Use file_get_contents to GET the URL in question.
$contents = file_get_contents($testURL);
 
//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    echo "<pre>"; $placeApiObject =  print_r(json_decode($contents)); echo "</pre>";
   $json_data = json_decode($contents, true);
   $place_id = $json_data['results'][0]['place_id'];
   $place_name = $json_data['results'][0]['name'];
   $rating = $json_data['results'][0]['rating'];
   $latitude = $json_data['results'][0]['geometry']['location']['lat'];
   $longitude = $json_data['results'][0]['geometry']['location']['lng'];
   $icon = $json_data['results'][0]['icon'];
   $open = $json_data['results'][0]['opening_hours']['open_now'];
   $price_level = $json_data['results'][0]['price_level'];
}


$Place_Object = new Place($place_id, $place_name, $rating, $latitude, $longitude,  $icon, $open, $price_level);

$Place_Object->printPlace();






?> 



