<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$place_1 = "ChIJ10mXAqfOYEgRLNAFN0GWq40";
$place_2 = "ChIJ3RBQHRvMYEgR07h8K4GxuYA";


$origin =  htmlspecialchars($_GET["origin"]);
$destination =  htmlspecialchars($_GET["destination"]);
//$pref3 =  htmlspecialchars($_GET["pref3"]);

getDistance($place_1, $place_2);

//Future Optimisation, all this should be returned in a single API call
//calculate
//currentLocation -> place1
//place1 -> place 2
//place2 -> place 3
//place3 -> current location

function getDistance($origin_id, $destination_id){
    
    //mode of transport hard coded to walking in request
    //api hard coded to reuqest 
    
    $URL = "https://maps.googleapis.com/maps/api/directions/json?origin=place_id:" . $origin_id ."&destination=place_id:" . $destination_id . "&mode=walking&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";
     
    $APIresult = file_get_contents($URL);

    if($APIresult !== false){
        
    $json_data = json_decode($APIresult, true);
    
    
    $time = $json_data['routes'][0]['legs'][0]['duration']['text'];
    echo "<pre>";  print_r($time); echo "</pre>";
    
    }
    
    
    $master_array = array("TimeObject"=>$timeArray);
    echo json_encode($master_array);
   
    
//    if (!empty($json_data['routes']['bounds']['legs']['duration'["text"]))
//    {
//        $place_id = $json_data['results'][$i]["place_id"];
//    }  
//    else{
//        $place_id = "null";
//    }


}

?>