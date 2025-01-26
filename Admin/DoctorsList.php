<?php
include_once '../include/dbh.inc.php';  // Database connection

// Handle form submission for adding a doctor
if (isset($_POST['submit'])) {
    $doctor_name = $_POST['doctor_name'];
    $specialization = $_POST['specialization'];

    // Insert the doctor into the database
    $sql = "INSERT INTO doctors (DoctorName, DocSpec) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Error";
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $doctor_name, $specialization);
        mysqli_stmt_execute($stmt);
        echo "<p>Doctor added successfully!</p>";
    }
}

// Handle deletion of a doctor
if (isset($_GET['DocID'])) {
    $id = $_GET['DocID'];

    // Delete the doctor from the database
    $sql = "DELETE FROM doctors WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Error";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        echo "<p>Doctor deleted successfully!</p>";
        header("Location: DoctorsList.php");  // Refresh the page to avoid resubmission
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Orbitor, business, company, agency, modern, bootstrap4, tech, software" />
    <meta name="author" content="themefisher.com" />
    <title>Care Compass Hospitals</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />

    <!-- Bootstrap and other required styles -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../plugins/icofont/icofont.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body id="top">
<header>
    <div class="header-top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-bar-info list-inline-item pl-0 mb-0">
                        <li class="list-inline-item">
                            <a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@cchospitals.lk</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="icofont-location-pin mr-2"></i>Kandy | Colombo | Kurunegala
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h1 class="text-capitalize mb-5 text-lg">Add New Doctor</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Add Doctor Details</h2>
                    <p class="mb-4">Please provide the doctor's name and specialization.</p>
                    <form id="doctor-form" method="post" action="DoctorsList.php">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="doctor_name" id="doctor_name" type="text" class="form-control" placeholder="Doctor's Name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="specialization" id="specialization" type="text" class="form-control" placeholder="Specialization" required>
                                </div>
                            </div>

                        </div>
                        <button type="submit" name="submit" class="btn btn-main btn-round-full">
                            Add Doctor<i class="icofont-simple-right ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-12 mt-5">
                <h2 class="mb-2 title-color">Doctors List</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Doctor's Name</th>
                            <th>Specialization</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch and display the doctors from the database
                        $sql = "SELECT * FROM doctors";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['DocID'] . "</td>";
                            echo "<td>" . $row['DoctorName'] . "</td>";
                            echo "<td>" . $row['DocSpec'] . "</td>";
                            // Make sure the 'id' is passed correctly in the URL for deletion
                            echo "<td><a href='DoctorsList.php?id=" . $row['DocID'] . "' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
// Include Footer
include_once '../Footer.php';
?>

</body>
</html>
