<?php
session_start();

if (isset($_POST["appsubmit"])) {
    // Check if user is logged in
    if (! isset($_SESSION['userid'])) {
        header("location:../Login.php?error=notloggedin");
        exit();
    }

    // Retrieve the logged-in user's id
    $user_id = $_SESSION['userid'];

    // Retrieve and trim form inputs
    $patientName       = trim($_POST["name"]);
    $patientAge        = trim($_POST["age"]);
    $patientPhone      = trim($_POST["phone"]);
    $patientEmail      = trim($_POST["email"]);
    $doctorId          = trim($_POST["doctor"]); // Now receiving doctor_id
    $appointmentBranch = trim($_POST["branch"]);
    $appointmentDate   = trim($_POST["date"]);
    // The appointment time (Apptime) is part of the form but not used in the new schema.

    // Include the database connection file (ensure it connects to cch_hospitals)
    require_once 'dbh.inc.php';

    // Basic validation
    if (empty($patientName) || empty($patientAge) || empty($patientPhone) || empty($patientEmail) || empty($doctorId) || empty($appointmentBranch) || empty($appointmentDate)) {
        header("location:../Appointment.php?error=emptyfields");
        exit();
    }

    // Prepare SQL statement to insert the appointment into the patients table
    $sql  = "INSERT INTO patients (user_id, patient_name, patient_age, patient_phone, patient_email, doctor_id, appointment_branch, appointment_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Appointment.php?error=sqlerror");
        exit();
    }

    // Bind parameters: user_id is an integer, patient_age is integer, doctor_id is integer
    mysqli_stmt_bind_param($stmt, "isississ", $user_id, $patientName, $patientAge, $patientPhone, $patientEmail, $doctorId, $appointmentBranch, $appointmentDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:../Appointment.php?success=appointmentmade");
    exit();
} else {
    header("location:../Appointment.php");
    exit();
}