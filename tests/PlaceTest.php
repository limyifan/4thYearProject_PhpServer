<?php



class PlaceTest extends PHPUnit_Framework_TestCase {

    public function testPrintPlace() {
        require_once '../Place.php';
        //require 'Place.php';
      
     //        $expected = 'Open';
    //        $this->expectOutputString($expected);
              $place = new Place(1, "name","musuem", 3, 23, 25, "", "1", "img");
        $place->latitude = 23;
     //   $place->checkOpen();
         $this->assertEqual($place->getName(),"name");

    }

}
