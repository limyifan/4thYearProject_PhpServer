<?php

//$place_1 = "ChIJ10mXAqfOYEgRLNAFN0GWq40";
//$place_2 = "ChIJ3RBQHRvMYEgR07h8K4GxuYA";


include '../Credentials.php';


function getDistanceLatLng(&$lat1, &$lng1, &$lat2, &$lng2) {


    $URL = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $lat1 . "," . $lng1 . "&destination=" . $lat2 . "," . $lng2 . "&mode=walking&key=" . $_SESSION["PLACES_API_KEY"];


    $APIresult = file_get_contents($URL);


    if ($APIresult !== false) {

        $json_data = json_decode($APIresult, true);

        if (!empty($json_data['routes'][0]['legs'][0]['duration']['text'])) {
            $time = $json_data['routes'][0]['legs'][0]['duration']['text'];

            return stringToInt($time);
        } else {
            echo "Time Unknown";
        }
    }
}



function stringToInt(&$timeString){

    return $timeAsInt = (int) filter_var($timeString, FILTER_SANITIZE_NUMBER_INT);
    
}