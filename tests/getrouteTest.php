<?php

require_once '../api/RandomRoute/getroute.php';

class PlaceTest extends PHPUnit_Framework_TestCase {

    public function testPlaceName() {
        //require 'Place.php';
        $place = new Place(1, "name","musuem", 3, 23, 25, "", "open", "price_level");
        $place->latitude = 23;
       $this->assertSame($place->getName(),"name");
    }

}
