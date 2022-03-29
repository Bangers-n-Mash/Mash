<?php

session_start();

$db = require('../../includes/connect_DB.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accountID'])) {

  $db;

  $errors = array();

  $id = $_POST['accountID'];

  if (!empty($_POST['forename'])) {
    $fn = trim($_POST['forename']);
    $q = "UPDATE artaccount SET forename='$fn' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['surname'])) {
    $sn = trim($_POST['surname']);
    $q = "UPDATE artaccount SET surname='$sn' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['email'])) {

    $e = trim($_POST['email']);

    $q = "SELECT * FROM artaccount WHERE email='$e'";
    $r = @mysqli_query($link, $q);

    if (mysqli_num_rows($r) == 0) {
      $q = "UPDATE artaccount SET email='$e' WHERE accountID='$id'";
      $r = @mysqli_query($link, $q);
    } else {
      $errors[] = "This email already exists.";
    }
  }

  if (!empty($_POST['phone_no'])) {
    $pn = trim($_POST['phone_no']);
    $q = "UPDATE artaccount SET phone_no='$pn' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['account_type'])) {
    $at = trim($_POST['account_type']);
    $q = "UPDATE artaccount SET account_type='$at' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['account_status'])) {
    $as = trim($_POST['account_status']);
    $q = "UPDATE artaccount SET account_status='$as' WHERE accountID='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../users.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['artID'])) {

  $db;

  $errors = array();

  $id = $_POST['artID'];


  if (!empty($_POST['title'])) {
    $vm = trim($_POST['title']);
    $q = "UPDATE artwork SET title='$vm' WHERE artID='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['artDescription'])) {
    $vmod = trim($_POST['artDescription']);
    $q = "UPDATE artwork SET artDescription='$vmod' WHERE artID='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['artVisibility'])) {
    $vs = trim($_POST['artVisibility']);
    $q = "UPDATE artwork SET artVisibility='$vs' WHERE artID='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  if ($_POST['artType'] == 'Picture') {
    header("Refresh:0; url=../artwork.php");
  } else if ($_POST['artType'] == 'Text') {
    header("Refresh:0; url=../documents.php");
  }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {

  $db;

  $errors = array();

  $id = $_POST['post_id'];

  if (!empty($_POST['post_title'])) {
    $pt = trim($_POST['post_title']);
    $q = "UPDATE news SET post_title='$pt' WHERE post_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['post_content'])) {
    $pc = trim($_POST['post_content']);
    $q = "UPDATE news SET post_content='$pc' WHERE post_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../news.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_post'])) {

  $db;

  $errors = array();

  if (!empty($_POST['new_post'])) {

    $pt = trim($_POST['new_post']);
    $pc = trim($_POST['post_content']);
    $date = date("jS \of F\, Y");

    $q = "SELECT * FROM news WHERE post_title='$pt'";
    $r = @mysqli_query($link, $q);

    if (mysqli_num_rows($r) == 0) {
      $q = "INSERT INTO news (post_date, post_title, post_content) VALUES ('$date', '$pt', '$pc')";
      $r = @mysqli_query($link, $q);
    } else {
      $errors[] = "This post already exists.";
    }
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../news.php");
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
