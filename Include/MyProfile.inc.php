<?php
// Function to fetch the user's profile data from the users table
function getUserProfile($conn, $user_id)
{
    $sql  = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user   = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $user;
}

// Function to fetch the lab payment records for the user, including lab service details
function getUserPayments($conn, $user_id)
{
    $sql = "SELECT lp.*, ls.test_name
            FROM lab_payments lp
            JOIN laboratory_services ls ON lp.labserv_id = ls.labserv_id
            WHERE lp.user_id = ?
            ORDER BY lp.payment_date DESC";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result   = mysqli_stmt_get_result($stmt);
    $payments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $payments;
}