<?php
    include_once 'Admin.Header.php';

    // Check if the user is logged in as admin
    if (! isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
        header("location:../Login.php?error=restrictedaccess");
        exit();
    }

    // Include the common tables file
    include_once 'common_tables.php';
?>

<!-- Top Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="../Logout.php">
            <img src="../images/CCH_LOGO.png" alt="logo" class="img-fluid" />
        </a>
    </div>
    <div class="container-fluid">
        <h1>
            <a class="navbar-brand" href="#">Admin Dashboard</a>
        </h1>
        <div class="ms-auto">
            <a href="?logout=true" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h3 class="text-center mb-4">Menu</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#doctor-management"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-user-md"></i> Doctor Management
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#patient-information"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i> Appointments Information
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#Queries-information"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i> Queries
                    </a>
                </li>
                <li class="nav-item">
                    <a href="StaffList.php"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                   <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i> Manage Staff
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Payments.php"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                  <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i> Lab Payments
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 content">
            <!-- Add Doctor Form -->
            <form method="post" class="mb-4">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="doctor_name" class="form-control" placeholder="Doctor's Name" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="specialization" class="form-control" placeholder="Specialization"
                            required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="add_doctor" class="btn btn-success w-100">Add Doctor</button>
                    </div>
                </div>
            </form>

            <!-- Display Doctors Table with Delete Option -->
            <?php displayDoctorsTable($conn, true); ?>
            <script>
            function confirmDelete(doctorId) {
                if (confirm("Confirm deletion of this Doctor details?")) {
                    window.location.href = "AdminDash.php";
                }
            }
            </script>

            <!-- Display Appointments Table with Delete Option -->
            <?php displayAppointmentsTable($conn, true); ?>
            <script>
            function confirmDelete(doctorId) {
                if (confirm("Confirm deletion of this Appointment details?")) {
                    window.location.href = "AdminDash.php";
                }
            }
            </script>

            <!-- Display Queries Table with Delete Option -->
            <?php displayQueriesTable($conn, true); ?>
            <script>
            function confirmDelete(doctorId) {
                if (confirm("Confirm deletion of this Query details?")) {
                    window.location.href = "AdminDash.php";
                }
            }
            </script>

        </div>
    </div>
</div>

</body>

</html>