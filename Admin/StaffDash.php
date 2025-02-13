<?php
    include_once 'Admin.Header.php';

    // Restrict access to only staff members
    if (! isset($_SESSION["staff"])) {
        header("location: ../Login.php?error=unauthorized");
        exit();
    }
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
                        <a href="#doctor-management" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-user-md"></i> Doctor Informations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#patient-information" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i> Appointments Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#Queries-information" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i> Patient Reports
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <h2 id="doctor-management">Doctor List</h2>
                <p>Manage doctor records here.</p>

                <!-- Doctors Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Doctor's Name</th>
                            <th>Specialization</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql    = "SELECT * FROM doctors ORDER BY DoctorName ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . "Dr. " . $row['DoctorName'] . "</td>";
                                    echo "<td>" . $row['DocSpec'] . "</td>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No records found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>

                <!-- Patient Information Section -->
                <h2 id="patient-information">Appointments Information</h2>
                <p>Manage patient records here.</p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Doctor</th>
                                <th>Branch</th>
                                <th>Date</th>
                                <th>Time Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql    = "SELECT * FROM patients ORDER BY AppDate ASC";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['PatientName'] . "</td>";
                                        echo "<td>" . $row['PatientAge'] . "</td>";
                                        echo "<td>" . $row['PatientPhone'] . "</td>";
                                        echo "<td>" . $row['PatientEmail'] . "</td>";
                                        echo "<td>" . $row['DoctorName'] . "</td>";
                                        echo "<td>" . $row['AppBranch'] . "</td>";
                                        echo "<td>" . $row['AppDate'] . "</td>";
                                        echo "<td>" . $row['App_at'] . "</td>";
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No records found.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!--Queries-->

                <h2 id="Queries-information">Queries</h2>
                <p>See what they ask</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
