<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */







function returnJsonToClient(&$arrayName, &$array){
    
    $jsonArray = array("$arrayName" => $array);
    
    echo json_encode($jsonArray);
}


function outputJsonTidy(&$array){
    
    echo "<pre>"; 
    print_r($array);
    echo "</pre>";
    
}



?>