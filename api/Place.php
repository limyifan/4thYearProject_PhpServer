<?php

class Place{
   
    public $place_id;
    public $place_name;
    public $place_type;
    public $rating;
    public $latitude;
    public $longitude;
    public $icon;
    public $open;
    public $cover_image;
    public $average_time;//minutes

    public function __construct($place_id, $place_name,$place_type,$rating, $latitude, $longitude, $icon, $open, $cover_image, $average_time){
        $this->place_id = $place_id;
        $this->place_name = $place_name;
        $this->place_type = $place_type;
        $this->rating = $rating;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->icon = $icon;
        $this->open = $open;
        //$this->price_level = $price_level;
        $this->cover_image = $cover_image;
        $this->average_time = $average_time;
    }
    
    function getName(){
        return $this->place_name;
    }

    public function printPlace(){
        echo "<br>" . $this->place_name . "\t" . $this->rating  . "\t <a>" . $this->cover_image . "</a>";
    }
    
    public function setCoverImage(&$photo_reference){
        $this->cover_image = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=". $photo_reference ."&key=" . $_SESSION["PLACES_API_KEY"];
    }
    
    public function setAverageTime(){
        
        $this->average_time = 60;
        
    }



}







?>