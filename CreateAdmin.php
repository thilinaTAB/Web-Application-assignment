<?php
/*
require_once 'Include\dbh.inc.php'; // Ensure DB connection is included

$adminUsername = "CCHAdmin";
$adminPassword = "CCHpw"; // Change this to your actual password

$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT); // Secure hashing

$sql  = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $adminUsername, $hashedPassword);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Admin account created successfully!";
} else {
    echo "Error: Admin account was not created.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
*/
