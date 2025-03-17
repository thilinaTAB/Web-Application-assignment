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

    $LPName  = trim($_POST["LPname"]);
    $LPAge   = trim($_POST["LPage"]);
    $LPPhone = trim($_POST["LPphone"]);
    $LPEmail = trim($_POST["LPemail"]);
    $LPId    = trim($_POST["service"]); 
    $LPDate  = trim($_POST["LPdate"]); 
    $LPtype  = trim($_POST["paytype"]);

    
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    // Basic validation
    if (empty($LPName) || empty($LPAge) || empty($LPPhone) || empty($LPEmail) || empty($LPId) || empty($LPDate) || empty($LPtype)) {
        header("location:../LabPayment.php?error=emptyfields");
        exit();
    }
    
    LabPayment($conn, $user_id, $LPName, $LPAge, $LPId, $amount, $status);
    
} else {
    header("location:../LabPayment.php");
    exit();
}