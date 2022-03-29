<?php

session_start();

require('../../includes/connect_DB.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accountID'])) {

  $errors = array();

  $id = $_POST['accountID'];

  # On success new password into 'artaccount' database table.
  if (!empty($_POST['accountID'])) {

    $q = "DELETE FROM artaccount WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../users.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['artGroupID'])) {

  $errors = array();

  $id = $_POST['artGroupID'];

  # On success new password into 'artaccount' database table.
  if (!empty($_POST['artGroupID'])) {

    $q = "DELETE FROM artgroups WHERE artGroupID='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../groups.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['artID'])) {

  $errors = array();

  $id = $_POST['artID'];

  # On success new password into 'artaccount' database table.
  if (!empty($_POST['artID'])) {

    $q = "DELETE FROM artwork WHERE artID='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../artwork.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {

  $errors = array();

  $id = $_POST['post_id'];

  # On success new password into 'artaccount' database table.
  if (!empty($_POST['post_id'])) {

    $q = "DELETE FROM news WHERE post_id='$id'";
    $r = @mysqli_query($link, $q);

  }

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../news.php");
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>