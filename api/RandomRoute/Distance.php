<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "Distance";



function getDistance($origin_id, $destination_id){
    
    //mode of transport hard coded to walking in request
    //api hard coded to reuqest 
    
    $URL = "https://maps.googleapis.com/maps/api/directions/json?origin=" . $origin_id ."&destination=" . $destination_id . "&mode=walking&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw";
    
}



?>