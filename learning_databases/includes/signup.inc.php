<?php
if (isset($_POST['submit'])) {
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $email = $_POST['email'];
       $uid = $_POST['uid'];
       $pwd = $_POST['pwd'];
       $pwdRepeat = $_POST['pwdRepeat'];

       require_once 'dbh.inc.php';
       require_once 'functions.inc.php';
    
       if (emptyInputSignup($fname, $lname, $email, $uid, $pwd, $pwdRepeat) !== false) {
            header('Location: ../signup.php?error=emptyinput');
            exit();
       }
       if (invalidUid($uid) !== false) {
            header('Location: ../signup.php?error=invaliduid');
            exit();
       }
       if (invalidEmail($email) !== false) {
            header('Location: ../signup.php?error=invalidemail');
            exit();
       }
       if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header('Location: ../signup.php?error=passwordsdonotmatch');
            exit();
       }
       if (uidExists($conn, $email, $uid) !== false) {
            header('Location: ../signup.php?error=uidtaken');
            exit();
       }
    
       createUser($conn, $fname, $lname, $email, $uid, $pwd);

} else {
    header('Location: ../signup.php');
    exit();
   }
