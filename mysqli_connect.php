<?php

// Defined as constants so that they can't be changed
// DEFINE ('DB_USER', 'studentweb');
// DEFINE ('DB_PASSWORD', 'turtledove');
// DEFINE ('DB_HOST', 'localhost');
// DEFINE ('DB_NAME', 'hms');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser




$dbc = @mysqli_connect("localhost", "root", "", "hms")
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>