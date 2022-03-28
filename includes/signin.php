<?php

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'connect_DB.php';
    require_once 'functions.php';

    loginUser($link, $username, $password);
} else {
    header("location: ../login.php");
    exit();
}
