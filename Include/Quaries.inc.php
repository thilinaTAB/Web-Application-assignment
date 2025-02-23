<?php

// Function to check for empty fields
function emptyQuaries($Qname, $Qemail, $Qphone, $QTitle, $Qbody)
{
    return empty($Qname) || empty($Qemail) || empty($Qphone) || empty($QTitle) || empty($Qbody);
}

// Function to insert query into the database
function submitQuaries($conn, $Qname, $Qemail, $Qphone, $QTitle, $Qbody)
{
    $sql  = "INSERT INTO queries (query_user, query_email, query_phone, query_title, query_body) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL preparation failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssiss", $Qname, $Qemail, $Qphone, $QTitle, $Qbody);

    if (! mysqli_stmt_execute($stmt)) {
        die("SQL execution failed: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);

    // Redirect with success message
    header("location: ../Contact.php?success=queriessubmitted");
    exit();
}

if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php'; // Ensure database connection file is included

    $Qname  = $_POST["Qname"];
    $Qemail = $_POST["Qemail"];
    $Qphone = $_POST["Qphone"];
    $QTitle = $_POST["Qtitle"];
    $Qbody  = $_POST["Qbody"];

    // Check for empty fields
    if (emptyQuaries($Qname, $Qemail, $Qphone, $QTitle, $Qbody)) {
        header("location: ../Contact.php?error=emptyfields");
        exit();
    }

    // Call function to submit query
    submitQuaries($conn, $Qname, $Qemail, $Qphone, $QTitle, $Qbody);
} else {
    header("location: ../Contact.php");
    exit();
}