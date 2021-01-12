<?php
    include_once 'includes/dbh.inc.php';// this line allows us to access the connection varible we made named conn
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index.php</title>
</head>
<body>
<? php 
    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('Daniel', 'Nielsen', 'myemail@gmail.com', 'Admin', 'password123');";
    mysqli_query($conn, $sql);
?>
</body>
</html>
