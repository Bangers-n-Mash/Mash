<?php

session_start();

require('../../includes/connect_db.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {

  $errors = array();

  $id = $_POST['user_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['user_id'])) {

    $q = "DELETE FROM users WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../users.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['campus_id'])) {

  $errors = array();

  $id = $_POST['campus_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['campus_id'])) {

    $q = "DELETE FROM campus WHERE campus_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../campus.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vehicle_id'])) {

  $errors = array();

  $id = $_POST['vehicle_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['vehicle_id'])) {

    $q = "DELETE FROM vehicle WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../vehicle.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {

  $errors = array();

  $id = $_POST['post_id'];

  # On success new password into 'users' database table.
  if (!empty($_POST['post_id'])) {

    $q = "DELETE FROM news WHERE post_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../news.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['booking_id'])) {

  $errors = array();

  $id = $_POST['booking_id'];

  if (!empty($_POST['booking_id'])) {

    $q = "DELETE FROM booking WHERE booking_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../booking.php");
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>