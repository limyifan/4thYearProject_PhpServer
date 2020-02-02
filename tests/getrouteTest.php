<?php

require_once '../api/RandomRoute/getroute.php';

class PlaceTest extends PHPUnit_Framework_TestCase {

    public function testExpectFooActualFoo() {
        //require 'Place.php';
        $place = new Place(1, "name", 3, 23, 25, "", "open", "price_level");
        $place->latitude = 23;
       $this->assertEqual($place->getName(),"name");
    }

}
