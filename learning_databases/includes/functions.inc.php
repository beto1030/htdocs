<?php
function emptyInputSignup($fname, $lname, $email, $uid, $pwd, $pwdRepeat) {
    $result;
    if(empty($fname) || empty($lname) || empty($uid) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function invalidUid($uid) {
    $result;
    if(!preg_match('/^[a-zA-Z0-9]*$/', $uid)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if($pwd !== $pwdRepeat) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $email, $uid) {
    $sql = 'SELECT * FROM users WHERE user_email = ? OR user_uid = ?;';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.inc.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'ss', $email, $uid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {// this checks true or false and your able to store it in a variable at the same time
        return $row;
    }else {
       $result = false;
       return $result; 
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $fname, $lname, $email, $uid, $pwd) {
    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.inc.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);// password_hash() is a built in php function 

    mysqli_stmt_bind_param($stmt, 'sssss', $fname, $lname, $email, $uid, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../signup.php?error=none");
    exit();
}
function emptyInputLogin($uid, $pwd) {
    $result;
    if(empty($uid) || empty($pwd)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $uid, $pwd) {
    $uidExists = uidExists($conn, $uid, $uid);// there is two uid parameters one is for username or email

    if ($uidExists === false) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists['user_pwd'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location: ../login.php?error=wronglogin");
        exit();
    }elseif ($checkPwd === true) {
        session_start();
        $_SESSION['userid'] = $uidExists['user_id']; 
        $_SESSION['useruid'] = $uidExists['user_uid']; 

        header("Location: ../index.php");
        exit();
    }
}
