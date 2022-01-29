<?php

$serverName = "localhost";
$database = "mash";
$username = "mash";
$passowrd = "2VFNtrZS2QWH";

$link = mysqli_connect($serverName, $username, $passowrd, $database);

if (!$link) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}
echo "connected successfully";

?> 