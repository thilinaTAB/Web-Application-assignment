<?php
session_start(); // Start the session to access login data

// Function to check for empty fields
function emptyfb($fbName, $FbTitle, $fbNote)
{
    return empty($fbName) || empty($FbTitle) || empty($fbNote);
}

// Function to insert feedback into the database
// Now accepts the logged-in user's id as $userId
function submitFB($conn, $userId, $fbName, $FbTitle, $fbNote)
{
    $sql  = "INSERT INTO feedback (user_id, fb_username, feedback_topic, feedback_note) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL statement failed: " . mysqli_error($conn));
    }

    // Bind parameters: user_id is an integer, then three strings
    mysqli_stmt_bind_param($stmt, "isss", $userId, $fbName, $FbTitle, $fbNote);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect back to feedback page with success message
    header("location: ../AddFeedback.php?success=feedbacksubmitted");
    exit();
}

// Check if form was submitted
if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php'; // Ensure database connection file is included

    // Check if user is logged in
    if (! isset($_SESSION['userid'])) {
        header("location: ../Login.php?error=notloggedin");
        exit();
    }

    $userId  = $_SESSION['userid']; // Get user id from session
    $fbName  = $_POST["name"];      // Display name input
    $FbTitle = $_POST["FbTitle"];
    $fbNote  = $_POST["fbNote"];

    // Check for empty fields
    if (emptyfb($fbName, $FbTitle, $fbNote)) {
        header("location: ../AddFeedback.php?error=emptyfields");
        exit();
    }

    // Call function to submit feedback with user id from session
    submitFB($conn, $userId, $fbName, $FbTitle, $fbNote);
} else {
    header("location: ../AddFeedback.php");
    exit();
}
