<?php



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