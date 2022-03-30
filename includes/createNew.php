<?php
if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $private = $_POST["private"];
    $group = $_POST["group"];

    require_once 'connect_DB.php';
    require_once 'functions.php';

    createArt($link, $title, $description, $type, $private, $group);
} else {
    header("location: ../login.php");
    exit();
}
