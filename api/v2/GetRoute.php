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
//utilities
include_once '../../resources/utilities/utility.php';
include_once './v2_handler.php';

//required code
include_once '../Credentials.php';
include_once '../Place.php';
include_once '../Categories.php';
//include_once './GetTime.php';
include_once '../Blacklist.php';





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




include '../QueryRouteAPI.php';




$firstLocationLat = $placesArray[0]->latitude;
$firstLocationLng = $placesArray[0]->longitude;


$initialTime = getDistanceLatLng($lat, $lng, $firstLocationLat, $firstLocationLng);


$estimatedTotalTime = 0 + $initialTime;


$jsonArray = array();

function cmp($a, $b) {
    return strcmp($b->rating, $a->rating);
}



$foodActivityCount = 0;




    $travelMode = "Walking";

    $summaryTime = 0;


    for ($i = 0; $i < count($placesArray) - 1; $i ++) {

        echo "<br>food count" . $foodActivityCount;
        
            if (!onBlackList($placesArray[$i]->place_id)) {
                
                if(!checkFoodActivityExists($foodActivityCount)){
                    
                    if(checkIsFoodActivity($placesArray[$i]->place_type)){
                        addFoodActivity($placesArray, $i, $jsonArray);
                        $foodActivityCount ++;
                    }
                    
                }
                else{
                    echo "<br>adding otehr type";
                }


                
                
                
                

//                if ($placesArray[$i]->place_type == "restaurant" || $placesArray[$i]->place_type == "cafe" || $placesArray[$i]->place_type == "meal_delivery") {
//
//                    if ($foodCount < 1) {
//                        $foodCount++;
//
//                        $walkingAverageTime = getDistanceLatLng($placesArray[$i]->latitude, $placesArray[$i]->longitude, $placesArray[$i + 1]->latitude, $placesArray[$i + 1]->longitude);
//                        $placeAverageTime = $placesArray[$i]->average_time;
//
//                        array_push($jsonArray, $placesArray[$i]);
//                        array_push($jsonArray, createTravelObject($placesArray[$i]->latitude, $placesArray[$i]->longitude, $travelMode, $placesArray[$i + 1]->latitude, $placesArray[$i + 1]->longitude));
//
//                        $tempTime = $walkingAverageTime + $placeAverageTime;
//                        $summaryTime = $tempTime + $summaryTime;
//                    }
//                } else {
//
//
//                    $placeAverageTime = $placesArray[$i]->average_time;
//                    $walkingAverageTime = getDistanceLatLng($placesArray[$i]->latitude, $placesArray[$i]->longitude, $placesArray[$i + 1]->latitude, $placesArray[$i + 1]->longitude);
//
//                    $tempTime = $walkingAverageTime + $placeAverageTime;
//                    $summaryTime = $tempTime + $summaryTime;
//
//                    $remainingTime = $time - $walkingAverageTime;
//
//                    echo "<br>/////////////";
//                    echo "<br>Total Time" . $time;
//                    echo "<br>Place Time" . $placeAverageTime;
//                    echo "<br>Walking Time" . $walkingAverageTime;
//                    echo "<br>";
//
//                    //if ($walkingAverageTime <= $remainingTime) {
//                        array_push($jsonArray, $placesArray[$i]);
//                        //array_push($jsonArray, createTravelObject($placesArray[$i]->latitude, $placesArray[$i]->longitude, $travelMode, $placesArray[$i + 1]->latitude, $placesArray[$i + 1]->longitude));
//                    //}
//                   // echo "<br>" . $summaryTime . "<br>";
//                }
            }
        //}
         else {
            //echo "Cant create Object";
        }
    }










$arrayObjectTitle = "PlaceObject";
//returnJsonToClient($arrayObjectTitle, $jsonArray);

outputJsonTidy($jsonArray);


