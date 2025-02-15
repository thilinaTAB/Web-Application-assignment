<?php
    include_once 'Admin.Header.php';

    // Check if the user is logged in as admin
    if (! isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
        header("location:../Login.php?error=restrictedaccess");
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
            <a class="navbar-brand" href="#">Admin Dashboard</a>
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
                        <a href="AdminDash.php" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-user-md"></i> Back to Main Menu
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <h2 id="doctor-management">Staff Management</h2>
                <p>Manage Staff records here.</p>

                <!-- Add Staff Form -->
                <div class="ms-auto">
                <a href="Staff.Signup.php" class="btn btn-success">
                Add Staff Member
                </a>
                </div>

                <!-- Doctors Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Staff ID</th>
                            <th>NIC Number</th>
                            <th>Contact Number</th>
                            <th>Staff Mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql    = "SELECT * FROM staff ORDER BY staff_role ASC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['staff_name'] . "</td>";
                                    echo "<td>" . $row['staff_role'] . "</td>";
                                    echo "<td>" . $row['staff_identifier'] . "</td>";
                                    echo "<td>" . $row['staff_nic'] . "</td>";
                                    echo "<td>" . $row['staff_contact'] . "</td>";
                                    echo "<td>" . $row['staff_email'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='?delete_staff=" . $row['staff_id'] . "'
                                    class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this Staff Member?');\">Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No records found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>