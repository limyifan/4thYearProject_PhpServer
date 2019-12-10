<?php 


//Reenable this when callin via URL postman
//$location =  htmlspecialchars($_GET["location"]);
//$time =  htmlspecialchars($_GET["time"]);



$location = $_POST['location'];
$time = $_POST['time'];
1234
echo "You are in " . $location . ". You have " . $time . " minutes.";


$xml = file_get_contents("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=". $location . "&inputtype=textquery&fields=geometry,name&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw");

echo $xml;

?>

