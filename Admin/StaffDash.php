<?php
    include_once 'Admin.Header.php';

    // Restrict access to only staff members
    if (! isset($_SESSION["staff"])) {
        header("location: ../Login.php?error=unauthorized");
        exit();
    }

    include_once 'common_tables.php';
?>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <div class="row w-100">
      <!-- Left: Logo -->
      <div class="col-4 d-flex align-items-center">
         <a class="navbar-brand" href="../Logout.php">
            <img src="../images/CCH_LOGO.png" alt="logo" class="img-fluid">
         </a>
      </div>
      <!-- Center: Title -->
      <div class="col-4 d-flex justify-content-center align-items-center">
         <h1 class="mb-0">Staff Dashboard</h1>
      </div>
      <!-- Right: Username Dropdown -->
      <div class="col-4 d-flex justify-content-end align-items-center">
            <?php
                if (isset($_SESSION["staffname"])) {
                    echo '<div class="dropdown">
                    <h5>
                        <class="nav-link dropdown-toggle text-dark">
                         Hi! ' . htmlspecialchars($_SESSION["staffname"]) . '
                        </a>
                    </h5>
                    <a href="?logout=true" class="btn btn-danger">Logout</a>
                </div>';
                }
            ?>
      </div>
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
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-user-md"></i> Doctor Informations
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#patient-information"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                        <i class="fas fa-users"></i> Appointments Information
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#Queries-information"
                        class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
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