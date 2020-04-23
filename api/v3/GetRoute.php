<?php

//HTTP Request Variables
$URL_LATITUDE = null;
$URL_LONGITUDE = null;
$URL_PREFERENCE_1 = null;
$URL_PREFERENCE_2 = null;
$URL_PREFERENCE_3 = null;
$URL_USER_TIME = null;


try {
    if (empty($_GET['pref1']) || empty($_GET['pref2']) || empty($_GET['pref3'])) {
        populatePreferences($URL_LATITUDE, $URL_LONGITUDE, $URL_PREFERENCE_1, $URL_PREFERENCE_2, $URL_PREFERENCE_3, $URL_USER_TIME, $_GET["lat"], $_GET["lng"], $_GET["pref1"], $_GET["pref2"], $_GET["pref3"], $_GET["time"]);
    } else {
        parseHTTPRequest($URL_LATITUDE, $URL_LONGITUDE, $URL_PREFERENCE_1, $URL_PREFERENCE_2, $URL_PREFERENCE_3, $URL_USER_TIME, $_GET["lat"], $_GET["lng"], $_GET["pref1"], $_GET["pref2"], $_GET["pref3"], $_GET["time"]);
    }
} catch (Exception $ex) {
    echo 'TRIPIT_DEV: Failed to parse URL\nCaught exception: ',  $e->getMessage(), "\n";
}

printHTTPRequest($URL_LATITUDE, $URL_LONGITUDE, $URL_PREFERENCE_1, $URL_PREFERENCE_2, $URL_PREFERENCE_3, $URL_USER_TIME);

function parseHTTPRequest(&$latitude, &$longitude, &$preference1, &$preference2, &$preference3, &$userTime , &$url_lat, &$url_lng, &$url_pref1, &$url_pref2, &$url_pref3, &$url_time ) {
    echo "running normal";
    $latitude = $url_lat;
    $longitude = $url_lng;
    $preference1 = $url_pref1;
    $preference2 = $url_pref2;
    $preference3 = $url_pref3;
    $userTime = $url_time;
}


/*
Trigger: Called if less than three preferences passed from the client.
 * This function will take the preferences passed from the client and comapre them with all preference options available.
 * It will then remove the ones already selected from an option pool. 
 * It will then populate the available preference slots with random preferences.
*/

function populatePreferences(&$latitude, &$longitude, &$preference1, &$preference2, &$preference3, &$userTime , &$url_lat, &$url_lng, &$url_pref1, &$url_pref2, &$url_pref3, &$url_time ){
   
    //Preferences that have been passed in, add them to an array if they are not empty.
    $URL_pref = array();
    if(!empty($url_pref1)){ array_push($URL_pref, $url_pref1);}
    if(!empty($url_pref2)){ array_push($URL_pref, $url_pref2);}
    if(!empty($url_pref3)){ array_push($URL_pref, $url_pref3);}

    //All possible preferences provided by Tripit.
    $Possible_pref = array("Food", "History", "Leisure", "Entertainment", "Arts_Culture", "Sport", "PopularPlaces", "AfterDark");
    
    //Compare two new arrays above and
    //remove already selected preferences from the option pool.
    foreach ($URL_pref as $i) {

        foreach ($Possible_pref as $x) {
            
            if ($i == $x) {

                if (($key = array_search($x, $Possible_pref)) !== false) {
                    unset($Possible_pref[$key]);
                }

            }
        }
    }
    
    //Removed Elements have created and array with inconsistent indexes.
    $ResetIndexPreferences = array_values($Possible_pref);
    
    //How many additional preferences should this function provide.
    $difference = 3 - count($URL_pref);
    
    
    $Preferences = array();
    
    //For as many preferences needed;
    for($i =0; $i < $difference; $i ++){
        //Select a random index of the possible preferences remaining.
        $RandomIndex = rand(1, count($ResetIndexPreferences) - 1);
        //Add new preference to selection.
        array_push($Preferences,$ResetIndexPreferences[$RandomIndex]);
        //Set the recently added index's value to be the value index offest by 1 to prevent duplicates.
        $ResetIndexPreferences[$RandomIndex] = $ResetIndexPreferences[$RandomIndex -1];
    }

    //Combine the original passed preferences with the new random ones.
    for($i = 0; $i < count($Preferences); $i ++){
        array_push($URL_pref, $Preferences[$i]);
    }
    

    //Link the preferences to variables for server work.
    $preference1 = $URL_pref[0];
    $preference2 = $URL_pref[1];
    $preference3 = $URL_pref[2];
    
    //Continue with the program as normal, as if the correct amount of values where passed originally.
    parseHTTPRequest($latitude, $longitude, $preference1, $preference2, $preference3, $userTime, $url_lat, $url_lng, $url_pref1, $url_pref2, $url_pref3, $url_time);
}


function automateHTTPRequest(&$latitude, &$longitude, &$preference1, &$preference2, &$preference3, &$userTime){
    echo "running default";
    $latitude =  "53.997945";
    $longitude =  "-6.4059567";
    $preference1 =  "Food";
    $preference2 =  "History";
    $preference3 = "Entertainment";
    $userTime =  240;
}


function printHTTPRequest(&$latitude, &$longitude, &$preference1, &$preference2, &$preference3, &$userTime){
    echo "<br>Printing Request";
    echo "<br>LAT -> ". $latitude . "<br>LNG -> " . $longitude . "<br>". $preference1 . ", " . $preference2 . ", " . $preference3 . "<br>MINs ->" . $userTime;
}




?>


