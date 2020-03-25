<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//


//$lat =  htmlspecialchars($_GET["lat"]);
//$lng =  htmlspecialchars($_GET["lng"]);
//
//
//$pref1 =  htmlspecialchars($_GET["pref1"]);
//$pref2 =  htmlspecialchars($_GET["pref2"]);
//$pref3 =  htmlspecialchars($_GET["pref3"]);


//Testing Data - Dundalk Market Square
$lat = "54.004160";
$lng = "-6.402970";
$radius = "50";

$pref1 = "Food";
$pref2 = "Sport";
$pref3 = "Entertainment";


include_once '../Credentials.php';
include_once '../Place.php';
include_once '../Categories.php';
include_once './v1_handler.php';
//PLACES API Key
$PLACES_API_key = $_SESSION["PLACES_API_KEY"];


$preferences = array($pref1, $pref2, $pref3);

//An array that will contain Places API field types that match the preferences above.
$fieldTypes = array();
//Populating the Array
assignCategory($pref1, $pref2, $pref3, $fieldTypes);


//Putting all field types into a single array to make API call easier.
$fieldTypesForAPI = array();


//For loop that will call the Places API for each field type above and call the create place object function.
foreach ($fieldTypes as $key => $value) {
    foreach ($value as $category => $items) {
        // $category is Food/Sport/AfterDark etc
        foreach ($items as $inner_key => $item) {
            array_push($fieldTypesForAPI, $item);
        }
    }
}


$placesArray = array();

for ($i = 0; $i < count($fieldTypesForAPI); $i++) {

    $URL = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $lat . "," . $lng . "&type=" . $fieldTypesForAPI[$i] . "&rankby=distance" . "&key=" . $PLACES_API_key;

    $APIresult = file_get_contents($URL);

    ParseApiResult($placesArray, $APIresult);
    //echo "<pre>";  print_r($APIresult); echo "</pre>";
}


$master_array = array("PlaceObject" => $placesArray);
echo "<pre>";
print_r($master_array);
echo "</pre>";


//echo json_encode($master_array);