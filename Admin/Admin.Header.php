
<?php
    session_start();

    // Check if the user is logged in as admin
    if (! isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
        header("location:../Login.php?error=restrictedaccess");
        exit();
    }

    // Handle logout
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header("location:../Login.php");
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

            $sql  = "INSERT INTO doctors (DoctorName, DocSpec) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $doctor_name, $specialization);
                mysqli_stmt_execute($stmt);
            }
        }

        // Handle deletion of a doctor
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];

            $sql  = "DELETE FROM doctors WHERE DocID = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
            }
        }

        if (isset($_GET['delete_patient'])) {
            $patient_id = $_GET['delete_patient'];

            $sql  = "DELETE FROM patients WHERE PatientId = ?";
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

        if (isset($_GET['delete_queries'])) {
            $Q_id = $_GET['delete_queries'];

            $sql  = "DELETE FROM queries WHERE Qid = ?";
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

