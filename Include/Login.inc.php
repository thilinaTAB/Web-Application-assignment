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

    // Check Admin Login from Database
    $sql  = "SELECT * FROM admin WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify hashed password
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["admin"]          = true;
            $_SESSION["admin_username"] = $row["username"];
            header("location:../Admin/AdminDash.php");
            exit();
        } else {
            header("location:../Login.php?error=wrongpassword");
            exit();
        }
    }

    // Check Staff or User Login
    if (isStaff($conn, $username)) {
        session_start();
        $_SESSION["staff"] = true; // Set staff session
        loginStaff($conn, $username, $password);
    } else {
        loginUser($conn, $username, $password);
    }

    mysqli_stmt_close($stmt);
} else {
    header("location:../Login.php");
    exit();
}