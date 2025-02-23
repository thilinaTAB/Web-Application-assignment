<?php
session_start();

// Check if one of the payment buttons is pressed
if (isset($_POST["pay_later"]) || isset($_POST["make_payment"])) {
    // Check if user is logged in
    if (! isset($_SESSION['userid'])) {
        header("location:../Login.php?error=notloggedin");
        exit();
    }

    $user_id = $_SESSION['userid'];

    // Retrieve and trim form inputs
    $LPName  = trim($_POST["LPname"]);
    $LPAge   = trim($_POST["LPage"]);
    $LPPhone = trim($_POST["LPphone"]);
    $LPEmail = trim($_POST["LPemail"]);
    $LPId    = trim($_POST["service"]); // labserv_id
    $LPDate  = trim($_POST["LPdate"]);  // date of payment (if needed)
    $LPtype  = trim($_POST["paytype"]); // Payment method

    // Basic validation
    if (empty($LPName) || empty($LPAge) || empty($LPPhone) || empty($LPEmail) || empty($LPId) || empty($LPDate) || empty($LPtype)) {
        header("location:../LabPayment.php?error=emptyfields");
        exit();
    }

    require_once 'dbh.inc.php';

    // Fetch the amount (price) for the selected lab service
    $sql  = "SELECT price FROM laboratory_services WHERE labserv_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../LabPayment.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $LPId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $amount = $row['price'];
    } else {
        header("location:../LabPayment.php?error=noservice");
        exit();
    }
    mysqli_stmt_close($stmt);

    // Determine payment status based on which button was pressed
    if (isset($_POST["pay_later"])) {
        $status = "Pending";
    } elseif (isset($_POST["make_payment"])) {
        $status = "Initiated"; // Temporary status until card processing is completed
    }

    // Insert a new record into lab_payments
    $sql  = "INSERT INTO lab_payments (user_id, labUserName, labUserAge, labserv_id, amount_paid, payment_status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../LabPayment.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "isiids", $user_id, $LPName, $LPAge, $LPId, $amount, $status);
    mysqli_stmt_execute($stmt);
    $labpayment_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if (isset($_POST["pay_later"])) {
        echo '<script>
            alert("Please make your payment before get your lab service");
            window.location.href = "../Index.php?payment=pending";
          </script>';
        exit();
    } elseif (isset($_POST["make_payment"])) {
        // For Make Payment, redirect to CardPayment.php, passing the labpayment_id
        header("location:../CardPayment.php?labpayment_id=" . $labpayment_id);
        exit();
    }
} else {
    header("location:../LabPayment.php");
    exit();
}