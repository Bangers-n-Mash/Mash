<?php

session_start();

$db = require('../../includes/connect_db.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {

  $db;

  $errors = array();

  $id = $_POST['user_id'];

  if (!empty($_POST['forename'])) {
    $fn = trim($_POST['forename']);
    $q = "UPDATE users SET forename='$fn' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['surname'])) {
    $sn = trim($_POST['surname']);
    $q = "UPDATE users SET surname='$sn' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['email'])) {

    $e = trim($_POST['email']);

    $q = "SELECT * FROM users WHERE email='$e'";
    $r = @mysqli_query($link, $q);

    if (mysqli_num_rows($r) == 0) {
      $q = "UPDATE users SET email='$e' WHERE user_id='$id'";
      $r = @mysqli_query($link, $q);
    } else {
      $errors[] = "This email already exists.";
    }
  }

  if (!empty($_POST['phone_no'])) {
    $pn = trim($_POST['phone_no']);
    $q = "UPDATE users SET phone_no='$pn' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['account_level'])) {
    $at = trim($_POST['account_level']);
    $q = "UPDATE users SET account_level='$at' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['account_status'])) {
    $as = trim($_POST['account_status']);
    $q = "UPDATE users SET account_status='$as' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../users.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_campus'])) {

  $db;

  $errors = array();

  if (!empty($_POST['new_campus'])) {

    $cn = trim($_POST['new_campus']);
    $ca = trim($_POST['campus_address']);

    $q = "SELECT * FROM campus WHERE campus_name='$cn'";
    $r = @mysqli_query($link, $q);

    if (mysqli_num_rows($r) == 0) {
      $q = "INSERT INTO campus (campus_name, campus_address) VALUES ('$cn', '$ca')";
      $r = @mysqli_query($link, $q);
    } else {
      $errors[] = "This campus already exists.";
    }
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../campus.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vehicle_id'])) {

  $db;

  $errors = array();

  $id = $_POST['vehicle_id'];

  if (!empty($_POST['vehicle_reg'])) {
    $reg = $_POST['vehicle_reg'];
    $q = "UPDATE vehicle SET vehicle_reg='$reg' WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['campus_id'])) {
    $cam = trim($_POST['campus_id']);
    $q = "UPDATE vehicle SET campus_id='$cam' WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['vehicle_make'])) {
    $vm = trim($_POST['vehicle_make']);
    $q = "UPDATE vehicle SET vehicle_make='$vm' WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['vehicle_model'])) {
    $vmod = trim($_POST['vehicle_model']);
    $q = "UPDATE vehicle SET vehicle_model='$vmod' WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['vehicle_colour'])) {
    $vc = trim($_POST['vehicle_colour']);
    $q = "UPDATE vehicle SET vehicle_colour='$vc' WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  if (!empty($_POST['vehicle_status'])) {
    $vs = trim($_POST['vehicle_status']);
    $q = "UPDATE vehicle SET vehicle_status='$vs' WHERE vehicle_id='$id'";
    $r = @mysqli_query($link, $q);
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../vehicle.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_vehicle'])) {

  $db;

  $errors = array();

  $v = trim($_POST['new_vehicle']);
  $ci = trim($_POST['campus_id']);
  $vm = trim($_POST['vehicle_make']);
  $vmod = trim($_POST['vehicle_model']);
  $vc = trim($_POST['vehicle_colour']);
  $vs = trim($_POST['vehicle_status']);

  if (!empty($_POST['new_vehicle'])) {
    $q = "INSERT INTO vehicle (vehicle_reg, campus_id, vehicle_make, vehicle_model, vehicle_colour, vehicle_status) VALUES ('$v', '$ci', '$vm', '$vmod', '$vc', '$vs')";
    $r = @mysqli_query($link, $q);
  } else {

    $errors[] = "There was an unexpected error";
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../vehicle.php");
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
