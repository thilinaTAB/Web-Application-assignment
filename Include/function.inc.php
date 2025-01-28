<?php
function emptyInputs($patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate) {
    $result;
    if (empty($patiantName) || empty($patiantAge) || empty($patiantPhone) || empty($patiantEmail) || 
        empty($DocName) || empty($AppBranch) || empty($patiantDate)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createUser($conn, $patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate) {
    $sql = "INSERT INTO patients (PatientName, PatientAge, PatientPhone, PatientEmail, DoctorName, AppBranch, AppDate) 
            VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Appointment.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "siissss", $patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Appointment.php?error=none");
    exit();
}

