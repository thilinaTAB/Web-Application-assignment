<?php
if (isset($_POST["submit"])) {
    $sName       = $_POST["sName"];
    $sNIC        = $_POST["sNIC"];
    $sContact    = $_POST["sContact"];
    $staffId     = $_POST["staffId"];
    $staffMail   = $_POST["staffMail"];
    $sRole       = $_POST["sRole"];
    $sPassword   = $_POST["sPassword"];
    $sRepassword = $_POST["sRepassword"];

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if (emptyStaffSignup($sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $sPassword, $sRepassword) !== false) {
        header("location:../Admin\Staff.Signup.php?error=emptyinput");
        exit();
    }
    if (invalidSid($staffId) !== false) {
        header("location:../Admin\Staff.Signup.php?error=invalidsid");
        exit();
    }
    if (invalidsMmail($staffMail) !== false) {
        header("location:../Admin\Staff.Signup.php?error=invalidemail");
        exit();
    }
    if (spwdMatch($sPassword, $sRepassword) !== false) {
        header("location:../Admin\Staff.Signup.php?error=passwordmismatch");
        exit();
    }
    if (sidExists($conn, $staffId, $staffMail) !== false) {
        header("location:../Admin\Staff.Signup.php?error=Staffuserexists");
        exit();
    }

    createNewStaff($conn, $sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $sPassword);
} else {
    header("location:../Admin\StaffDash.php");
    exit();
}
