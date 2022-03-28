<?php

//upload file
include('includes/auth_session.php');

$target_dir = "/var/www/html/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//Create entry in database:

include('includes/connect_DB.php');

$sql = $link->prepare("INSERT INTO content (content_type, title, description, file, likes, privacy) VALUES (?, ?, ?, ?, ?,?);");
$sql->bind_param("ssssi", $content_type, $content_title, $content_description, $content_file, $content_likes, $privacyType);

//$content_id set to assign by auto-increment in DB
$content_type = "picture"; //change to get from file type
$content_title = $_POST["title"];
$content_description = $_POST["description"]; 
$privacyType = $_POST["private"]
$content_file = $target_file;
$content_likes = 0;
$content_account_id; //take id of uploader's account
$content_category_id; //add category selection in form

$sql->execute();

echo "Database record created";

$sql->close();
$link->close();
