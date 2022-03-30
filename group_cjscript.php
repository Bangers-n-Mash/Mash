<?php

session_start();

$target_dir = "/var/www/html/img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$filename = $_FILES["fileToUpload"]["name"];

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
// if (
//     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") 
// {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  }
else {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('includes/connect_DB.php');
    $errors = array();
    $groupName = mysqli_real_escape_string($link, trim($_POST['groupName']));

    $q = "SELECT artGroupID FROM artgroups WHERE groupName='$groupName'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) $errors[] = 'Group Already Exists. <a href="group_cj.php">Attempt Again</a>';

    if (empty($errors)) {
        echo 'Some random text';
        $q = "INSERT INTO artgroups(groupName, groupProfilePicture) VALUES ('$groupName', '$target_file')";
        $r = @mysqli_query($link, $q);
        echo 'Some random text';

        $q = "SELECT artGroupID FROM artgroups WHERE groupName='$groupName'";
        $r = @mysqli_query($link, $q);
        $temp_Data = mysqli_fetch_object($r, MYSQLI_NUM);
  
        $q2 = "INSERT INTO noofmemgroup(artGroupID, accountID, moderat) VALUES ('$temp_Data[0]', '$_SESSION['accountID']', 1)";

        $r2 = @mysqli_query($link, $q3);
        $_SESSION['GroupName'] = $groupName;
        $_SESSION['GroupID'] = $temp_Data[0];
        header("Location: grouppage.php");
        # Close database connection.
        exit();
      }

      else {
        // echo '<div class="container">
        // <div class="alert alert-primary alert-dismissible fade show" role="alert">
        // <h1>Error!</h1>
        // <p id="err_msg">The following error(s) occurred:<br>';
        // foreach ($errors as $msg) {
        //   echo " - $msg<br>";
        // }
        // echo '<hr>
        // <p class="mb-0">Please try again.</p>
        // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        // <span aria-hidden="true">&times;</span>
        // </button>
        // </div>
        // </div>';
// # Close database connection.
// mysqli_close($link);
}
}
  if (move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
  } else {
      echo "Sorry, there was an error uploading your file.";
  }
}

    # Check form submitted.
?>