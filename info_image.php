<?php
//Pass in GPS.GPSLatitude or GPS.GPSLongitude or something in that format
function getGps($exifCoord, $hemi) {

    $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
    $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
    $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;

    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;

    return $flip * ($degrees + $minutes / 60 + $seconds / 3600);

}

function gps2Num($coordPart) {

    $parts = explode('/', $coordPart);

    if (count($parts) <= 0)
        return 0;

    if (count($parts) == 1)
        return $parts[0];

    return floatval($parts[0]) / floatval($parts[1]);
}

$exif = exif_read_data('images/alinea.jpg');
$lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
$lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
var_dump($lat, $lon);

$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=48.636733333333,6.1883111111111&key=AIzaSyB6nLcv2kg9QwdlEwqhyJRKYVRkp7IXdec";

// get the json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    echo utf8_decode($resp['results'][0]['address_components'][2]['long_name']);

    echo "<pre>";
    print_r($resp);
    echo "</pre>pre>";

//reverse GPS : AIzaSyB6nLcv2kg9QwdlEwqhyJRKYVRkp7IXdec
?>
