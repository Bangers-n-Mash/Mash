<?php
require('includes/connect_DB.php')

$account_username = $_POST["inputUsername"];
$account_password=$_POST["inputPassword"];
$account_forename=$_POST["forename"];
$account_surname=$_POST["surname"];
$account_email=$_POST["inputEmail"];
$account_bday=$_POST["birthday"];
$account_creationDate = date('d/m/Y');
$accountType = 1;

$query = "INSERT into 'artAccount'(username, accountPassword, forename, surname, email, account_type, creation_date, dateOfBirth) VALUES ('$account_username', '" .md5($account_password) ."', '$account_forename', '$account_surname', '$account_email', '$accountType', '$account_creationDate', '$account_bday')";
$result =mysqli_query($link,$query)

// $sql->execute();

echo "Account Created";
?>