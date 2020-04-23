<?php

//HTTP Request Variables
$URL_LATITUDE = null;
$URL_LONGITUDE = null;
$URL_PREFERENCE_1 = null;
$URL_PREFERENCE_2 = null;
$URL_PREFERENCE_3 = null;
$URL_USER_TIME = null;


try{
    parseHTTPRequest($URL_LATITUDE,$URL_LONGITUDE,$URL_PREFERENCE_1,$URL_PREFERENCE_2,$URL_PREFERENCE_3,$URL_USER_TIME, $_GET["lat"],$_GET["lng"],$_GET["pref1"],$_GET["pref2"],$_GET["pref3"],$_GET["time"]);
} catch (Exception $ex) {
    automateHTTPRequest($URL_LATITUDE,$URL_LONGITUDE,$URL_PREFERENCE_1,$URL_PREFERENCE_2,$URL_PREFERENCE_3,$URL_USER_TIME);
}

printHTTPRequest($latitude, $longitude, $preference1, $preference2, $preference3, $userTime);

function parseHTTPRequest(&$latitude, &$longitude, &$preference1, &$preference2, &$preference3, &$userTime , &$url_lat, &$url_lng, &$url_pref1, &$url_pref2, &$url_pref3, &$url_time ) {
    echo $latitude;
    $latitude = $url_lat;
    $longitude = $url_lng;
    $preference1 = $url_pref1;
    $preference2 = $url_pref2;
    $preference3 = $url_pref3;
    $userTime = $url_time;
}


function automateHTTPRequest(&$latitude, &$longitude, &$preference1, &$preference2, &$preference3, &$userTime){
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


