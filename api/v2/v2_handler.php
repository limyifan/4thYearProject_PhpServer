<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addActivity(&$placesArray, &$arrayIndex, &$jsonArray){
    
    array_push($jsonArray, $placesArray[$arrayIndex]);
    
}


function addFoodActivity(&$placesArray, &$arrayIndex, &$jsonArray) {

    array_push($jsonArray, $placesArray[$arrayIndex]);

}

function checkIsFoodActivity(&$placeType) {

    if ($placeType == "restaurant" || $placeType == "cafe" || $placeType == "meal_delivery") {
        return true;
    } else {
        return false;
    }
    
}

function checkFoodActivityExists(&$foodActivityCount){
    
    if($foodActivityCount < 1){
        return false;
    }
    else{
        return true;
    }
    
}

function onBlackList($place_id) {
    for ($i = 0; $i <= $_SESSION["places_blacklist_size"]; $i ++) {
        if ($place_id == $_SESSION["places_blacklist"][$i]) {
            return true;
        }
    }
}

?>
