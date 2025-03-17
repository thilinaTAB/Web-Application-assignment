<?php
session_start();

if (isset($_POST["appsubmit"])) {
    // Check if user is logged in
    if (! isset($_SESSION['userid'])) {
        header("location:../Login.php?error=notloggedin");
        exit();
    }

    $user_id = $_SESSION['userid'];

    $patientName       = trim($_POST["name"]);
    $patientAge        = trim($_POST["age"]);
    $patientPhone      = trim($_POST["phone"]);
    $patientEmail      = trim($_POST["email"]);
    $doctorId          = trim($_POST["doctor"]);
    $appointmentBranch = trim($_POST["branch"]);
    $appointmentDate   = trim($_POST["date"]);


    // database connection
    require_once 'dbh.inc.php';

    //validation
    if (empty($patientName) || empty($patientAge) || empty($patientPhone) || empty($patientEmail) || empty($doctorId) || empty($appointmentBranch) || empty($appointmentDate)) {
        header("location:../Appointment.php?error=emptyfields");
        exit();
    }

    //insert into the patients table
    $sql  = "INSERT INTO patients (user_id, patient_name, patient_age, patient_phone, patient_email, doctor_id, appointment_branch, appointment_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Appointment.php?error=sqlerror");
        exit();
    }

    // Bind parameters:
    mysqli_stmt_bind_param($stmt, "isississ", $user_id, $patientName, $patientAge, $patientPhone, $patientEmail, $doctorId, $appointmentBranch, $appointmentDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo '<script>
            alert("Appointment submitted successfully!\nWe will contact you soon to verify your appointment");
            window.location.href = "../index.php?Success=Appointment";
          </script>';
exit();
    header("location:../Appointment.php?success=appointmentmade");
    exit();
} else {
    header("location:../Appointment.php");
    exit();
}