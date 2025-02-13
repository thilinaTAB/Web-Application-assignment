<?php
if (isset($_POST["submit"])) {
    $username = $_POST["uname"];
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
        header("location:../Login.php?error=emptyinput");
        exit();
    }

    // Admin Login
    if ($username === "CCHAdmin" && $password === "CCHpw") {
        session_start();
        $_SESSION["admin"] = true;
        header("location:../Admin/AdminDash.php");
        exit();
    }

    // Staff Login
    if (isStaff($conn, $username)) {
        session_start();
        $_SESSION["staff"] = true; // Set staff session
        loginStaff($conn, $username, $password);
    } else {
        loginUser($conn, $username, $password);
    }
} else {
    header("location:../Login.php");
    exit();
}
