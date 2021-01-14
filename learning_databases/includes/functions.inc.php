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
function uidExists($conn, $uid, $email) {
    $sql = 'SELECT * FROM users WHERE user_uid = ? OR user_email = ?;';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.inc.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'ss', $uid, $email);
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
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.inc.php?error=stmtFailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);// password_hash() is a built in php function 

    mysqli_stmt_bind_param($stmt, 'sssss', $fname, $lname, $email, $uid, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../signup.php?error=none");
    exit();
}
