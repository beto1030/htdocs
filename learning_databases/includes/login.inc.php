<?php
if (isset($_POST['submit'])) {
    $uid = $_POST['name'];//this is name attribute in login.php
    $pwd = $_POST['pwd'];//this is name attribute in login.php

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($uid, $pwd) !== false) {
         header('Location: ../login.php?error=emptyinput');
         exit();
    }

    loginUser($conn, $uid, $pwd);
}else {
    header('Location: ../login.php'); 
    exit();
}
