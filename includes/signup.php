<?php

if (isset($_POST['submit'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    require_once 'connect_DB.php';
    require_once 'functions.php';

    createUser($link, $firstname, $lastname, $username, $email, $password, $password2);
    exit();
} else {
    header("location: ../register.php");
    exit();
}
