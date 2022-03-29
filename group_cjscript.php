<?php

session_start();

require('includes/connect_DB.php');


$group_name = $_POST["groupName"];

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('includes/connect_DB.php');
    $errors = array();
    $groupName = mysqli_real_escape_string($link, trim($_POST['groupName']));;

    $q = "SELECT artGroupID FROM artGroups WHERE groupName='$groupName'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) $errors[] = 'Group Already Exists. <a href="group_cj.php">Attempt Again</a>';


$filename = $_FILES["fileToUpload"]["name"];
$tempname = $_FILES["fileToUpload"]["tmp_name"];    
$folder = "img/group_profile/".$filename;


if (empty($errors)) {
    echo 'Some random text';
    $q = "INSERT INTO artGroups(groupName, groupProfilePicture) VALUES ('$groupName', '$filename')";
    $r = @mysqli_query($link, $q);
    echo 'Some random text';

    $q = "SELECT artGroupID FROM artGroups WHERE groupName='$groupName'";
    $q2 = "SELECT accountID FROM artAccount WHERE username='$_SESSION['username']'";
    $q3 = "INSERT INTO noOfMemGroup(artGroupID, accountID, moderat) VALUES ('$q2', '$q', 1)";

    $r = @mysqli_query($link, $q3);
    $_SESSION['GroupName'] = $groupName;
    if ($r) {
      header("Location: grouppage.php");
    }

    # Close database connection.
    mysqli_close($link);

    exit();
  }
  else {
    echo '<div class="container">
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<h1>Error!</h1>
			<p id="err_msg">The following error(s) occurred:<br>';
    foreach ($errors as $msg) {
      echo " - $msg<br>";
    }
    echo '<hr>
			<p class="mb-0">Please try again.</p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		   </div>
		  </div>';
    # Close database connection.
    mysqli_close($link);
  }
}
?>