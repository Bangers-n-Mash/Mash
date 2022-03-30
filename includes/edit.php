<?php

session_start();

require('connect_DB.php');

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  echo "Cunts";

  $errors = array();

  $id = $_POST['accountID'];

  if (!empty($_POST['forename'])) {
    $fn = trim($_POST['forename']);
    $q = "UPDATE artaccount SET forename='$fn' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['firstname'] = $fn;
  }

  if (!empty($_POST['surname'])) {
    $ln = trim($_POST['surname']);
    $q = "UPDATE artaccount SET surname='$ln' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['lastname'] = $ln;
  }

  if (!empty($_POST['email'])) {
    $e = trim($_POST['email']);
    $q = "UPDATE artaccount SET email='$e' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['email'] = $e;
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../user_settings.php");
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
