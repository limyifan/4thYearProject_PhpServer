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
$lat = "54.003402";
echo "<br>currentLat: " . $lat;
$lng = "-6.403153";
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
include_once './GetTime.php';
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



$jsonArray = array();

function cmp($a, $b) {
    return strcmp($b->rating, $a->rating);
}



$foodActivityCount = 0;

    for ($i = 0; $i < count($placesArray) - 1; $i ++) {



        if (!onBlackList($placesArray[$i]->place_id)) {

            if (!checkFoodActivityExists($foodActivityCount)) {

                if (checkIsFoodActivity($placesArray[$i]->place_type)) {
                    addFoodActivity($placesArray, $i, $jsonArray);
                    $foodActivityCount ++;
                }
            } else {

                if (!checkIsFoodActivity($placesArray[$i]->place_type)) {
                    if(!onBlackList($placesArray[$i]->place_id)){
                        addActivity($placesArray, $i, $jsonArray);
                    }
                    
                }
            }

        }
    
    }


$masterArray = array();

$summaryTime = 0;

for($i = 0; $i < count($jsonArray) - 1; $i ++){
    
    $walkingTime =  findWalkingTime($jsonArray[$i]->latitude,$jsonArray[$i]->longitude,$jsonArray[$i + 1]->latitude,$jsonArray[$i + 1]->longitude);
    $activityTime = $jsonArray[$i]->average_time;
    
    $tempTime = $activityTime + $walkingTime;
    
    
    $summaryTime = $tempTime + $summaryTime;
    
    if($summaryTime < $time){
        array_push($masterArray, $jsonArray[$i]);        
    }
    else{

    }
    
}




echo $summaryTime;



$arrayObjectTitle = "PlaceObject";
//returnJsonToClient($arrayObjectTitle, $jsonArray);

outputJsonTidy($masterArray);


