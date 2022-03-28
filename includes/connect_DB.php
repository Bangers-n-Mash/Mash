<?php

$serverName = "localhost";
$database = "mash";
$dbUser = "dev";
$dbPassword = "2VFNtrZS2QWH";

$link = mysqli_connect($serverName, $dbUser, $dbPassword, $database);

if (!$link) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}
