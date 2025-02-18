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
                        <a href="AdminDash.php" class="nav-link                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php echo(strpos($_SERVER['REQUEST_URI'], 'doctor-management') !== false) ? 'active' : ''; ?>">
                            <i class="fas fa-user-md"></i> Back to Main Menu
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 content">
                <h2 id="doctor-management">Lab Payments</h2>
                <p>Manage Payment records here.</p>

                <!-- Lab payment Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Lab Service</th>
                            <th>Amount Paid</th>
                            <th>Status</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT lab_payments.*, laboratory_services.test_name
                            FROM lab_payments
                            JOIN laboratory_services ON lab_payments.labserv_id = laboratory_services.labserv_id
                            ORDER BY lab_payments.payment_date ASC";

                            $result = mysqli_query($conn, $sql);

                            if (! $result) {
                                die("SQL error: " . mysqli_error($conn));
                            }

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['labUserName']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['labUserAge']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['test_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['amount_paid']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['payment_status']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['payment_date']) . "</td>";
                                    echo "<td>";
                                    echo "<a href='?delete_payment=" . $row['labpayment_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this Payment record?');\">Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No records found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>