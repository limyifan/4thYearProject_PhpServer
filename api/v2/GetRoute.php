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

//Testing Data - Dundalk Market Square
$lat = "54.004160";
$lng = "-6.402970";
$pref1 = "Food";
$pref2 = "History";
$pref3 = "Entertainment";
$time = 120;


//File Includes
include_once '../Credentials.php';
include_once '../Place.php';
include_once '../Categories.php';





$preferences = array ($pref1,$pref2,$pref3);

//Putting all field types into a single array to make API call easier.
$fieldTypesForAPI = array();

//An array that will contain Places API field types that match the preferences above.
$fieldTypes = array();
//Populating the Array
assignCategory($pref1, $pref2, $pref3, $fieldTypes);


//Array with 
$placesArray = array();
include '../QueryPlaceAPI.php';


echo "<pre>";  print_r($placesArray); echo "</pre>";

echo "<br><br><br><br><br><br>";

print_r();



