<?php

$_SESSION["places_blacklist"] = array();


array_push($_SESSION["places_blacklist"], "ChIJH-i0KXnNYEgRhWWzp2J_agQ");
array_push($_SESSION["places_blacklist"], "ChIJ8Q9leArNYEgR-ruXe8swA0c");
array_push($_SESSION["places_blacklist"], "ChIJben7tMLNYEgRoCCR67vQoA8");

//This count is being used as an index for an array.
//I have -1 here because count starts at 1 but the array starts at 0.
$_SESSION["places_blacklist_size"] = count($_SESSION["places_blacklist"]) - 1;



?>


