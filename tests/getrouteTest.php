<?php

require_once '../api/RandomRoute/getroute.php';

class PlaceTest extends PHPUnit_Framework_TestCase {

    public function testPlaceName() {
        //require 'Place.php';
        $place = new Place(1, "name","musuem", 3, 23, 25, "", "open", "price_level");
        $place->latitude = 23;
       $this->assertSame($place->getName(),"name");
    }

        public function testSetCoverImage() {
        //require 'Place.php';
        $place = new Place(1, "name","musuem", 3, 23, 25, "", "open", "price_level");
        $photo_reference="reference";
     //   $place->setCoverImage(&$photo_reference);
   //    $this->assertSame($place->cover_image,$photo_reference);
    }
    public function testPrintPlace() 
            {
        $place = new Place(1, "name","musuem", 3, 23, 25, "", "open", "price_level");
        $expected = '<br>" name\t3\t <a>price_level</a>';
        //    $this->expectOutputString($expected);
       
            $place->printPlace();
            }
//    public function testparseAPIResult()
//    {
//        $placesArray;
//        $api_result='{
//    "PlaceObject": [
//        {
//            "place_id": "ChIJ10mXAqfOYEgRLNAFN0GWq40",
//            "place_name": "Panama Coffee",
//            "place_type": "cafe",
//            "rating": 4.6,
//            "latitude": 54.00436389999999,
//            "longitude": -6.403081299999998,
//            "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/cafe-71.png",
//            "open": "Open",
//            "cover_image": "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CmRaAAAAHwzIj9R3JSbjVd4aeQLL9xZounaRYMxMt8k4ktrSDQzOSViRqHcDJJoL2WypSmjzCaaeLJ1aFZ0W9ZrvOddfGhtSMNitFFOkfWWZlMukrWScieoXeOEpADreZemckS_iEhDu5LapNfXTbRRqy87nIZ74GhTMXdAdEfn-1QPfTmjXWueagGqFMw&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw"
//}]}';
//         parseAPIResult(& $placesArray, &$api_result);
//     
//    }
    
    
}
