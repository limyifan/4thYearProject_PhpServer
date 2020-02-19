<?php

/*
 * This script contains Tripit preferences and thier respective Google Places API Field Types. Its purpose is to match the two.
 * 
*/


function assignCategory(&$preference1, &$preference2, &$preference3, &$fieldTypes){
    
    $preferences = array($preference1,$preference2,$preference3);
    
    foreach($preferences as $pref){
        if($pref == "Food")
            {
            $foodArray = array("Food" => array("cafe","restaurant"));
            array_push($fieldTypes, $foodArray);
        }
        else if($pref == "History")
            {
            $historyArray = array("History" => array("city_hall","courthouse","museum"));
            //"university"
            array_push($fieldTypes, $historyArray);
        }
        else if($pref == "Leisure")
            {
            $leisureArray = array("Leisure" => array("amusement_park","aquarium","park","zoo"));
            array_push($fieldTypes, $leisureArray);
        }
        else if($pref == "Entertainment")
            {
            $entertainmentArray = array("Entertainment" => array("bowling_alley","movie_theater"));
            array_push($fieldTypes, $entertainmentArray);
        }
        else if($pref == "Sport")
            {
            $sportArray = array("Sport" => array("stadium"));
            array_push($fieldTypes, $sportArray);
        }
        else if($pref == "PopularPlaces")
            {
            $popularPlacesArray = array("PopularPlaces" => array("tourist_attraction"));
            array_push($fieldTypes, $popularPlacesArray);
        }
        else if($pref == "AfterDark")
            {
            $afterDarkArray = array("AfterDark" => array("bar","casino","night_club"));
            array_push($fieldTypes, $afterDarkArray);
        }
        else if($pref == "Arts_Culture")
            {
            $arts_cultureArray =  array("Arts_Culture" => array("art_gallery","library"));
            //"university"
            array_push($fieldTypes, $arts_cultureArray);
        }
        else if($pref == "Transport")
            {
            $transportArray = array("Transport" => array("airport","bus_station","car_rental","taxi_stand","train_station","transit_station","parking","subway_station","light_rail_station"));
            array_push($fieldTypes, $transportArray);
        }
        else if($pref == "Facility")
            {
            $facilityArray = array("Facility" => array("atm"));
            array_push($fieldTypes, $facilityArray);
        }

    }
    
    //echo "<pre>";  print_r($fieldTypes); echo "</pre>";
    
}

 

































