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

    // Check if the login is for the admin account
    if ($username === "CCHAdmin" && $password === "CCHpw") {
        // Redirect to the admin dashboard
        session_start();
        $_SESSION["admin"] = true;
        header("location:../Admin/AdminDash.php");
        exit();
    } else {
        // Regular user login
        loginUser($conn, $username, $password);
    }
} else {
    header("location:../Login.php");
    exit();
}