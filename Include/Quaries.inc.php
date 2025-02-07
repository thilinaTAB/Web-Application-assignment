<?php

// Function to check for empty fields
function emptyQuaries($Qname, $Qemail, $Qphone, $QTitle, $Qbody) {
    if (empty($Qname) || empty($Qemail) || empty($Qphone) || empty($QTitle) || empty($Qbody)) {
        return true;
    } else {
        return false;
    }
}

// Function to insert feedback into the database
function submitQuaries($conn, $Qname, $Qemail, $Qphone, $QTitle, $Qbody) {
    $sql = "INSERT INTO queries (Qname, Qemail, Qphone, Qtitle, Qbody ) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL statement failed: " . mysqli_error($conn)); // Show error if statement fails
    }

    mysqli_stmt_bind_param($stmt, "ssiss", $Qname, $Qemail, $Qphone, $QTitle, $Qbody);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect back to feedback page with success message
    header("location: ../Contact.php?success=queriessubmitted");
    exit();
}

// Check if form was submitted
if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php'; // Ensure database connection file is included

    $Qname = $_POST["Qname"];
    $Qemail = $_POST["Qemail"];
    $Qphone = $_POST["Qphone"];
    $QTitle = $_POST["Qtitle"];
    $Qbody = $_POST["Qbody"];


    // Check for empty fields
    if (emptyQuaries($Qname, $Qemail, $Qphone, $QTitle, $Qbody)) {
        header("location: ../Contact.php?error=emptyfields");
        exit();
    }

    // Call function to submit Query
    submitQuaries($conn, $Qname, $Qemail, $Qphone, $QTitle, $Qbody);
} else {
    header("location: ../Contact.php");
    exit();
}
?>
