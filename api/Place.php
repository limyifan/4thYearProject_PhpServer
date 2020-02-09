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

    
    public function __construct($place_id, $place_name,$place_type,$rating, $latitude, $longitude, $icon, $open, $cover_image){
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
        //$this->average_time = $average_time;
    }
    
    

    function getPlace_id() {
        return $this->place_id;
    }

    function getPlace_name() {
        return $this->place_name;
    }

    function getPlace_type() {
        return $this->place_type;
    }

    function getRating() {
        return $this->rating;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getIcon() {
        return $this->icon;
    }

    function getOpen() {
        return $this->open;
    }

    function getCover_image() {
        return $this->cover_image;
    }

    function getAverage_time() {
        return $this->average_time;
    }

    function setPlace_id($place_id) {
        $this->place_id = $place_id;
    }

    function setPlace_name($place_name) {
        $this->place_name = $place_name;
    }

    function setPlace_type($place_type) {
        $this->place_type = $place_type;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }
    
    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }
    
    function setIcon($icon) {
        $this->icon = $icon;
    }

    function setOpen($open) {
        $this->open = $open;
    }

    public function setCoverImage(&$photo_reference){
        $this->cover_image = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=". $photo_reference ."&key=" . $_SESSION["PLACES_API_KEY"];
    }
    
    public function setAverageTime($average_time) {
        $this->average_time = $average_time;
    }

    
    
    
    
    public function printPlace(){
        echo "<br>" . $this->place_name . "\t" . $this->rating  . "\t <a>" . $this->cover_image . "</a>";
    }
    




}







?>