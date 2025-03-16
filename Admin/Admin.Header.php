<?php
    session_start();

    // Handle logout
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
            echo '<script>
            alert("Log out succussfully");
            window.location.href = "AdminDash.php?error=none";
            </script>';
            exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../plugins/bootstrap/css/font/bootstrap-icons.css" />
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="../plugins/icofont/icofont.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Admin.Style.css" />
</head>

<body>

    <?php
        include_once '../include/dbh.inc.php'; // Database connection

        // Handle form submission for adding a doctor
        if (isset($_POST['add_doctor'])) {
            $doctor_name    = $_POST['doctor_name'];
            $specialization = $_POST['specialization'];

            $sql  = "INSERT INTO doctors (doctor_name, doctor_specialty) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $doctor_name, $specialization);
                mysqli_stmt_execute($stmt);
            }
            echo '<script>
            alert("Doctor Details Added");
            window.location.href = "AdminDash.php";
          </script>';
    exit();
        }

        // Handle deletion of doctors
        if (isset($_GET['delete_id'])) {
            $doctor_id = $_GET['delete_id'];

            $sql  = "DELETE FROM doctors WHERE doctor_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $doctor_id);
                mysqli_stmt_execute($stmt);
            }
        }

        // Handle deletion of staff
        if (isset($_GET['delete_staff'])) {
            $staff_id = $_GET['delete_staff'];

            $sql  = "DELETE FROM staff WHERE staff_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $staff_id);
                mysqli_stmt_execute($stmt);
            }
        }

         // Handle deletion of staff
         if (isset($_GET['delete_users'])) {
            $user_id = $_GET['delete_users'];

            $sql  = "DELETE FROM users WHERE user_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $user_id);
                mysqli_stmt_execute($stmt);
            }
        }

        // Handle deletion of Appointments
        if (isset($_GET['delete_patient'])) {
            $patient_id = $_GET['delete_patient'];

            $sql  = "DELETE FROM patients WHERE Patient_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $patient_id);
                mysqli_stmt_execute($stmt);
                header("Location: AdminDash.php"); // Redirect to refresh the page
                exit();
            } else {
                echo "Error preparing statement: " . mysqli_error($conn);
            }
        }

        // Handle deletion of query
        if (isset($_GET['delete_queries'])) {
            $Q_id = $_GET['delete_queries'];

            $sql  = "DELETE FROM queries WHERE query_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $Q_id);
                mysqli_stmt_execute($stmt);
                header("Location: AdminDash.php"); // Redirect to refresh the page
                exit();
            } else {
                echo "Error preparing statement: " . mysqli_error($conn);
            }
        }

    ?>