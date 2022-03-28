<?php
require('includes/connect_DB.php')

sql = $link->prepare("INSERT INTO artAccount (username, accountPassword, forename, surname, email, account_type, usercreation_date) VALUES (?, ?, ?, ?, ?, ?);");
$sql->bind_param("ssssi", $account_username, $account_password, $accountType, $account_email, $account_creationDate);
$account_username = $_POST["inputUsername"];
$account_password=$_POST["inputPassword"];
$account_email=$_POST["inputEmail"];
$account_bday=$_POST["birthday"];
$account_creationDate;
$accountType;
$query = "INSERT into 'artAccount'(username) VALUES ()"

$result =mysqli_query($con,$query)

$sql->execute();

echo "Account Created";
?>