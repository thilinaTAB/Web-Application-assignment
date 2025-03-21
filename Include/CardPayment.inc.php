<?php
session_start();
if (! isset($_SESSION['userid'])) {
    header("location:../Login.php?error=notloggedin");
    exit();
}

require_once 'dbh.inc.php';

if (isset($_POST['confirm_payment'])) {
    $labpayment_id = intval($_POST['labpayment_id']);
    $sql  = "UPDATE lab_payments SET payment_status = 'Completed' WHERE labpayment_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die("SQL error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $labpayment_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    echo '<script>
    alert("Thank you for your Payment! Visit your Profile for details");
    window.location.href = "../MyProfile.php?LoginSuccess";
  </script>';
    exit();
} elseif (isset($_POST['cancel_payment'])) {
    header("location:../Index.php?cancel=failed");
    exit();
} else {
    header("location:../CardPayment.php");
    exit();
}