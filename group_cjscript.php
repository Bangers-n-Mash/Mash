<?php

require('includes/connect_DB.php');


$group_name = $_POST["groupName"];




$filename = $_FILES["fileToUpload"]["name"];
$tempname = $_FILES["fileToUpload"]["tmp_name"];    
$folder = "img/".$filename;
      



$query = "INSERT into 'artGroup'(groupName, groupProfilePicture) VALUES ('$group_name', '$filename')";

$result =mysqli_query($link,$query);
 
   if (move_uploaded_file($tempname, $folder))  {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}

$group_id = mysqli_insert_id($link);
$account_id = $_SESSION['accountid'];

$query2 = "INSERT into 'noOfMemGroup'(artGroupID,accountID,moderat) VALUES ('$group_id',$account_id,1)";

$result =mysqli_query($link,$query2);


echo "Group Created";

?>