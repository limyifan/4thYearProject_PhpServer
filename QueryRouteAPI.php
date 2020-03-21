<?php

//$place_1 = "ChIJ10mXAqfOYEgRLNAFN0GWq40";
//$place_2 = "ChIJ3RBQHRvMYEgR07h8K4GxuYA";


include_once '../Credentials.php';

function getDistanceLatLng(&$lat1, &$lng1, &$lat2, &$lng2){
    
    //mode of transport hard coded to walking in request
    //api hard coded to reuqest 
    
        $URL = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $lat1 . "," . $lng1 .  "&destination=" . $lat2 . "," . $lng2 . "&mode=walking&key=" . $_SESSION["PLACES_API_KEY"];
    
    
    $APIresult = file_get_contents($URL);

    if($APIresult !== false){
        
        $json_data = json_decode($APIresult, true);

        if (!empty($json_data['routes'][0]['legs'][0]['duration']['text']))
        {
            $time = $json_data['routes'][0]['legs'][0]['duration']['text'];
            
            return stringToInt($time);
        }  
        else{
            echo "Time Unknown";
        }
    
    }

}

function getDistancePlaceID($origin_id, $destination_id){
    
    //mode of transport hard coded to walking in request
    //api hard coded to reuqest 
    
    $URL = "https://maps.googleapis.com/maps/api/directions/json?origin=place_id:" . $origin_id ."&destination=place_id:" . $destination_id . "&mode=walking&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";
     
    $APIresult = file_get_contents($URL);

    if($APIresult !== false){
        
        $json_data = json_decode($APIresult, true);

        if (!empty($json_data['routes'][0]['legs'][0]['duration']['text']))
        {
            $time = $json_data['routes'][0]['legs'][0]['duration']['text'];
            echo "<pre>";  print_r($time); echo "</pre>";
            stringToInt($time);
        }  
        else{
            echo "No Time";
        }
    
    }

}

function stringToInt(&$timeString){

    return $timeAsInt = (int) filter_var($timeString, FILTER_SANITIZE_NUMBER_INT);
    
}