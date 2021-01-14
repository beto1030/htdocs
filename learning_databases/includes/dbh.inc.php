<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "user_accounts";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
   echo "wtf";
   die("Connection failed: " . mysqli_connect_error());
}
