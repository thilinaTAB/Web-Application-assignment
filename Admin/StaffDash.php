<?php
    include_once 'Admin.Header.php';

    // Restrict access to only staff members
    if (! isset($_SESSION["staff"])) {
        header("location: ../Login.php?error=unauthorized");
        exit();
    }

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
            <a class="navbar-brand" href="#">Staff Dashboard</a>
            </h1>
            <div class="ms-auto">
                <a href="?logout=true" class="btn btn-danger">
                Logout
                </a>
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
                        <a href="#doctor-management" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-user-md"></i> Doctor Informations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#patient-information" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i> Appointments Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#Queries-information" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i> Queries-information
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
    <!-- Display Doctors Table  -->
    <?php displayDoctorsTable($conn, false); ?>

    <!-- Display Appointments Table -->
    <?php displayAppointmentsTable($conn, false); ?>

    <!-- Display Queries Table  -->
    <?php displayQueriesTable($conn, false); ?>
</div>

        </div>
    </div>


</body>
</html>

