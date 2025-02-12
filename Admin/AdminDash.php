<?php
    include_once 'Admin.Header.php';
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
                <a href="Staff.Signup.php" class="btn btn-success">
                Add Staff Member
                </a>
            </div>
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
                        <a href="#doctor-management" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-user-md"></i> Doctor Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#patient-information" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i> Appointments Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#Queries-information" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo(strpos($_SERVER['REQUEST_URI'], 'patient-information') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-users"></i> Queries
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <h2 id="doctor-management">Doctor Management</h2>
                <p>Manage doctor records here.</p>

                <!-- Add Doctor Form -->
                <form method="post" class="mb-4">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" name="doctor_name" class="form-control" placeholder="Doctor's Name" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="specialization" class="form-control" placeholder="Specialization" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="add_doctor" class="btn btn-success w-100">Add Doctor</button>
                        </div>
                    </div>
                </form>

                <!-- Doctors Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Doctor's Name</th>
                            <th>Specialization</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql    = "SELECT * FROM doctors";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . "Dr. " . $row['DoctorName'] . "</td>";
                                    echo "<td>" . $row['DocSpec'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='?delete_id=" . $row['DocID'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this doctor?');\">Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql    = "SELECT * FROM patients";
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
                                        echo "<td>";
                                        echo "<a href='?delete_patient=" . $row['PatientId'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this patient?');\">Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
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

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Time Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql    = "SELECT * FROM queries";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['Qname'] . "</td>";
                                        echo "<td>" . $row['Qphone'] . "</td>";
                                        echo "<td>" . $row['Qemail'] . "</td>";
                                        echo "<td>" . $row['Qtitle'] . "</td>";
                                        echo "<td>" . $row['Qbody'] . "</td>";
                                        echo "<td>" . $row['Qcreated_at'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='?delete_queries=" . $row['Qid'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this query?');\">Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No records found.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
