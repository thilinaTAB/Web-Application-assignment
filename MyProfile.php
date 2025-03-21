<?php
    session_start();
    if (! isset($_SESSION['userid'])) {
        header("location:Login.php?error=notloggedin");
        exit();
    }
    $user_id = $_SESSION['userid'];

    include_once 'Header.php';
    require_once 'Include/dbh.inc.php';
    require_once 'Include\function.inc.php';

    $user     = getUserProfile($conn, $user_id);
    $payments = getUserPayments($conn, $user_id);
    $appointments = getUserAppointments($conn, $user_id);
?>

<div class="container mt-5">
    <h1 class="mb-4">My Profile</h1>
    <div class="row">
        <!-- Profile Information -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    Profile Information
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>
        </div>
        <!-- Payment Information -->
        <div class="col-md-9    ">
            <div class="card mb-4">
                <div class="card-header">
                    Payment Information
                </div>
                <div class="card-body">
                    <?php if (! empty($payments)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Lab Service</th>
                                    <th>Amount Paid</th>
                                    <th>Status</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payments as $payment): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($payment['labUserName']); ?></td>
                                    <td><?php echo htmlspecialchars($payment['labUserAge']); ?></td>
                                    <td><?php echo htmlspecialchars($payment['test_name']); ?></td>
                                    <td><?php echo htmlspecialchars($payment['amount_paid']); ?></td>
                                    <td><?php echo htmlspecialchars($payment['payment_status']); ?></td>
                                    <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <p>No payment records found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Appointment Information -->
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">
                    Appointment Information
                </div>
                <div class="card-body">
                    <?php if (!empty($appointments)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Patient Age</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Doctor Name</th>
                                    <th>Branch</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointments as $appointment): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['patient_age']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['patient_phone']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['patient_email']); ?></td>
                                    <td><?php echo "Dr. ".htmlspecialchars($appointment['doctor_name']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['appointment_branch']); ?></td>
                                    <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <p>No appointment records found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    </div>
</div>

<?php include_once 'Footer.php'; ?>