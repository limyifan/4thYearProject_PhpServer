<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//!!Uncomment the following code for testing on server.
//$lat =  htmlspecialchars($_GET["lat"]);
//$lng =  htmlspecialchars($_GET["lng"]);
//$pref1 =  htmlspecialchars($_GET["pref1"]);
//$pref2 =  htmlspecialchars($_GET["pref2"]);
//$pref3 =  htmlspecialchars($_GET["pref3"]);
//$time =  htmlspecialchars($_GET["time"]);
//!!Uncomment the following code for testing on locally.
//Testing Data - DKIT
$lat = "53.984883";
echo "<br>currentLat: " . $lat;
$lng = "-6.393903";
echo "<br>currentLng: " . $lng;
$pref1 = "Food";
echo "<br>pref1: " . $pref1;
$pref2 = "History";
echo "<br>pref2: " . $pref2;
$pref3 = "Entertainment";
echo "<br>pref3: " . $pref3;
$time = 120;
echo "<br>Time: " . $time . " mins";


//File Includes
include_once '../Credentials.php';
include_once '../Place.php';
include_once '../Categories.php';
include_once './GetTime.php';





$preferences = array($pref1, $pref2, $pref3);

//Putting all field types into a single array to make API call easier.
$fieldTypesForAPI = array();

//An array that will contain Places API field types that match the preferences above.
$fieldTypes = array();
//Populating the Array
assignCategory($pref1, $pref2, $pref3, $fieldTypes);


//Array with 
$placesArray = array();
include '../QueryPlaceAPI.php';



$food = false;
$timeFilled = false;



include '../QueryRouteAPI.php';




$firstLocationLat = $placesArray[0]->latitude;
$firstLocationLng = $placesArray[0]->longitude;


$initialTime = getDistanceLatLng($lat, $lng, $firstLocationLat, $firstLocationLng);


$estimatedTotalTime = 0 + $initialTime;


$jsonArray = array();

function cmp($a, $b){
    return strcmp($b->rating, $a->rating);
}

//usort($placesArray, "cmp");


$foodCount = 0;
while (!$timeFilled) {
      
     //working on time here
     //need to set starting location
     //get disctance to first activity
     //add activity & transit time up
     //go through placesArray and add to new list if time to travelX & complete + time of previous is less than user given time
     //to get travelX use the location of the previous activty and the next activity in list
     //if time is to great skip this activity until you find one that adds up to less < user given time
$travelMode = "Walking";

        $summaryTime = 0;
        for ($i = 0; $i < count($placesArray); $i ++) {
            
            if($summaryTime < $time){
                
                if($placesArray[$i]->place_type == "restauraunt" || $placesArray[$i]->place_type  == "cafe"){
                    $foodCount ++;
                }
            
                
          //echo "Getting: " . $placesArray[$i]->latitude, $placesArray[$i]->longitude, $placesArray[$i+1]->latitude, $placesArray[$i+1]->longitude . "<br>";
            
                $walkingAverageTime = getDistanceLatLng($placesArray[$i]->latitude, $placesArray[$i]->longitude, $placesArray[$i+1]->latitude, $placesArray[$i+1]->longitude);
                $placeAverageTime = $placesArray[$i]->average_time;
                
                array_push($jsonArray, $placesArray[$i]);
                array_push($jsonArray, createTravelObject($placesArray[$i]->latitude, $placesArray[$i]->longitude, $travelMode, $placesArray[$i+1]->latitude, $placesArray[$i+1]->longitude));
                
            $tempTime = $walkingAverageTime + $placeAverageTime;
            $summaryTime = $tempTime + $summaryTime;
            //echo "Time to walk: " . $walkingAverageTime . "     Avg time at place: " . $placeAverageTime . "          \tTime Elapsed: " . $summaryTime . "<br>";
            //echo $tempTime . "  ". $summaryTime ."<br>";
            }
            else{
                  $timeFilled = true;
            }


        }
        //echo $summaryTime;
      
    
}



$master_array = array("PlaceObject"=>$placesArray);
echo "<pre>";  print_r($jsonArray); echo "</pre>";
//echo json_encode($master_array);


