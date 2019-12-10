<?php

class Place{
   
    public function __construct($place_id, $place_name,$rating, $latitude, $longitude,  $icon, $open, $price_level){
        $this->place_id = $place_id;
        $this->place_name = $place_name;
        $this->rating = $rating;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->icon = $icon;
        $this->open = $open;
        $this->price_level = $price_level;
    }


    
    //public function __construct($place_id, $place_name,$rating,$latitude, $longitude, $icon, $open, $price_level, array $types){
    //    $this->place_id = $place_id;
    //    $this->place_name = $place_name;
    //    $this->rating = $rating;
    //    $this->latitude = $latitude;
    //    $this->longitude = $longitude;
    //    $icon->icon = $icon;
    //    $open->open = $open;
    //    $price_level->price_level = $price_level;
    //    $types[] = array();
    //}
    

    public function printPlace(){
        echo "<br>== PLACE == <br>";
        echo $this->place_name . "<br>";
        echo $this->rating . "<br>";
        echo $this->place_id . "<br>";
        echo $this->latitude . "<br>";
        echo $this->longitude . "<br>";
        echo $this->icon . "<br>";
        echo $this->checkOpen() . "<br>";
        echo $this->checkPriceLevel() . "<br>";
    }
    
    private function checkOpen(){
        if($this->open == '1'){
            echo "Open";
        }
        
    }
    
    private function checkPriceLevel(){
        if($this->price_level == '1'){
            echo "Cheap";
        }
        
    }


}







?>