<?php
/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetPlace($json_data, $i)
{
    list($json_data, $place_id) = GetPlaceId($json_data, $i);

    list($json_data, $place_name) = GetPlaceName($json_data, $i);


    list($json_data, $place_type) = GetPlaceType($json_data, $i);


    list($json_data, $latitude) = GetLatitude($json_data, $i);

    list($json_data, $longitude) = GetLongitude($json_data, $i);


    list($json_data, $rating) = GetRating($json_data, $i);


    list($json_data, $icon) = GetIcon($json_data, $i);

    list($json_data, $cover_image) = GetCoverImage($json_data, $i);


    list($json_data, $open) = GetOpeningHours($json_data, $i);
    return array($place_id, $place_name, $place_type, $latitude, $longitude, $rating, $icon, $cover_image, $open);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetOpeningHours($json_data, $i)
{
    if (!empty($json_data['results'][$i]["opening_hours"])) {

        if (!empty($json_data['results'][$i]["opening_hours"]["open_now"])) {
            $open = "Open";
        } else {
            $open = "Closed";
        }
    } else {
        $open = "No Hours Provided";
    }
    return array($json_data, $open);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetCoverImage($json_data, $i)
{
    if (!empty($json_data['results'][$i]["photos"])) {

        if (!empty($json_data['results'][$i]["photos"][0]["photo_reference"])) {
            $cover_image = $json_data['results'][$i]["photos"][0]["photo_reference"];
        } else {
            $cover_image = "Photos = True but no Reference";
        }
    } else {
        $cover_image = "No Photos Provided";
    }
    return array($json_data, $cover_image);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetIcon($json_data, $i)
{
    if (!empty($json_data['results'][$i]["icon"])) {
        $icon = $json_data['results'][$i]["icon"];
    } else {
        $icon = "No Icon Provided";
    }
    return array($json_data, $icon);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetRating($json_data, $i)
{
    if (!empty($json_data['results'][$i]["rating"])) {

        $rating = $json_data['results'][$i]["rating"];

    } else {
        $rating = "No Rating";
    }
    return array($json_data, $rating);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetLongitude($json_data, $i)
{
    if (!empty($json_data['results'][$i]["geometry"]["location"]["lng"])) {
        $longitude = $json_data['results'][$i]["geometry"]["location"]["lng"];
    } else {
        $longitude = "No Lng Found";
    }
    return array($json_data, $longitude);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetLatitude($json_data, $i)
{
    if (!empty($json_data['results'][$i]["geometry"]["location"]["lat"])) {
        $latitude = $json_data['results'][$i]["geometry"]["location"]["lat"];
    } else {
        $latitude = "No Lat Found";
    }
    return array($json_data, $latitude);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetPlaceType($json_data, $i)
{
    if (!empty($json_data['results'][$i]["types"][0])) {
        $place_type = $json_data['results'][$i]["types"][0];
    } else {
        $place_type = "No Types Found";
    }
    return array($json_data, $place_type);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetPlaceName($json_data, $i)
{
    if (!empty($json_data['results'][$i]["name"])) {
        $place_name = $json_data['results'][$i]["name"];
    } else {
        $place_name = "No Place Name Found";
    }
    return array($json_data, $place_name);
}

/**
 * @param $json_data
 * @param $i
 * @return array
 */
function GetPlaceId($json_data, $i)
{
    if (!empty($json_data['results'][$i]["place_id"])) {
        $place_id = $json_data['results'][$i]["place_id"];
    } else {
        $place_id = "null";
    }
    return array($json_data, $place_id);
}

function ParseApiResult(&$placesArray, &$api_result)
{

    if ($api_result !== false) {
        $json_data = json_decode($api_result, true);

        for ($i = 0; $i < 1; $i++) {

            //Validating JSON Object to ensure all fields are present.
            list($place_id, $place_name, $place_type, $latitude, $longitude, $rating, $icon, $cover_image, $open) = GetPlace($json_data, $i);

            $average_time = 60;

            if ($place_id == "null") {
                //skip place
            } else {
                $Place_Object = new Place($place_id, $place_name, $place_type, $rating, $latitude, $longitude, $icon, $open, $cover_image, $average_time);
                $Place_Object->setCoverImage($cover_image);
                $Place_Object->setAverageTime();
                array_push($placesArray, $Place_Object);
            }

        }

    }

}