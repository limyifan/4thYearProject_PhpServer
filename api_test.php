<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Place API=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw
 */


"https://maps.googleapis.com/maps/api/place/search/json?location=30.487263,-97.970799&radius=25000&types=airport&sensor=false&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";

"https://maps.googleapis.com/maps/api/place/findplacefromtext/json?key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";

"https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Guiness%20Store%20House&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";

"https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=Guiness%20Store%20House&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";

$places =[];

require 'Place.php';

$Guiness = new Place("Guiness Store House", "4.4", "0419567465", "dsdadsdasdasdasdasdad");

$Guiness->printPlace();

