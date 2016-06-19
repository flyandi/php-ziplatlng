<?php

include("../src/ziplatlng.php");


if($result = ZIPLatLng(92067)) {

    if($result->zip == 92067) {

        die(sprintf("Success for %s Latitude = %s Longitude = %s", 
            $result->zip, $result->latitude, $result->longitude
        ));
    }

}

die("Failed to acquire zip code.");