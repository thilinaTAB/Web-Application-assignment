<?php

// Function to check for empty fields
function emptyQuaries($fbName, $FbTitle, $fbNote) {
    if (empty($fbName) || empty($FbTitle) || empty($fbNote)) {
        return true;
    } else {
        return false;
    }
}

// Function to insert feedback into the database
function submitFB($conn, $fbName, $FbTitle, $fbNote) {
    $sql = "INSERT INTO feedback (FbName, Topic, FbNote) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL statement failed: " . mysqli_error($conn)); // Show error if statement fails
    }

    mysqli_stmt_bind_param($stmt, "sss", $fbName, $FbTitle, $fbNote);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect back to feedback page with success message
    header("location: ../AddFeedback.php?success=feedbacksubmitted");
    exit();
}

// Check if form was submitted
if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php'; // Ensure database connection file is included

    $fbName = $_POST["name"];
    $FbTitle = $_POST["FbTitle"];
    $fbNote = $_POST["fbNote"];


    // Check for empty fields
    if (emptyfb($fbName, $FbTitle, $fbNote)) {
        header("location: ../AddFeedback.php?error=emptyfields");
        exit();
    }

    // Call function to submit feedback
    submitFB($conn, $fbName, $FbTitle, $fbNote);
} else {
    header("location: ../AddFeedback.php");
    exit();
}
?>
