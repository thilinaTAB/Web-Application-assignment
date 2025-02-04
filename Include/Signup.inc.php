<?php
if (isset($_POST["submit"])) {
    $username = $_POST["uname"];
    $email = $_POST["email"];
    $userid = $_POST["userid"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if (emptyInputSignup($username, $email, $userid, $password, $repassword) !== false) {
        header("location:../Signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($userid) !== false) {
        header("location:../Signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location:../Signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($password, $repassword) !== false) {
        header("location:../Signup.php?error=passwordmismatch");
        exit();
    }
    if (uidExists($conn, $userid, $email) !== false) {
        header("location:../Signup.php?error=userexists");
        exit();
    }

    createNewUser($conn, $username, $email, $userid, $password);
} else {
    header("location:../Signup.php");
    exit();
}