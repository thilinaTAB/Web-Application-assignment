<?php
    session_start();

    // Check if the user is logged in
    if (! isset($_SESSION["userid"])) {
        echo '<script>
            alert("Please login to make a Payment.");
            window.location.href = "Login.php?error=notloggedin";
          </script>';
        exit();
    }

    include_once 'Header.php';
?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Pay your bills at your fingertips</span>
                    <h1 class="text-capitalize mb-5 text-lg">Online Payment</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="feature-icon mb-3">
                        <i class="icofont-support text-lg"></i>
                    </div>
                    <a href="tel:+94115959999">
                        <span class="h3">Call for Live Agent!</span>
                        <h2 class="text-color mt-3">+94 11 59 59 999</h2>
                    </a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-2 title-color">Payments for Lab Reports</h2>
                    <p class="mb-4">Please select your required service. Do not request a refund after payment.</p>
                    <form id="payment-form" class="appoinment-form" method="post" action="Include/LabPayment.inc.php">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <input name="LPname" id="LPname" type="text" class="form-control"
                                        placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input name="LPage" id="LPage" type="number" min="0" class="form-control"
                                        placeholder="Your Age" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="LPphone" id="LPphone" type="tel" class="form-control"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="LPemail" id="LPemail" type="email" class="form-control"
                                        placeholder="Email" required>
                                </div>
                            </div>

                            <div class="col-lg-10">
                                <div class="form-group">
                                    <select class="form-control" id="service" name="service" required>
                                        <option value="">Select Lab Service</option>
                                        <?php
                        // Include the database connection file
                        include_once 'Include/dbh.inc.php';

                        // Query to fetch lab services
                        $sql    = "SELECT labserv_id, test_name, price FROM laboratory_services";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $servInfo = $row['test_name'] . " - Rs." . $row['price'];
                                echo "<option value='" . $row['labserv_id'] . "'>" . $servInfo . "</option>";
                            }
                        } else {
                            echo "<option value=''>No services available</option>";
                        }
                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input name="LPdate" id="LPdate" type="date" class="form-control"
                                        placeholder="Date (dd/mm/yyyy)" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control" id="paytype" name="paytype" required>
                                        <option value="">Select Payment Method</option>
                                        <option>Credit Card</option>
                                        <option>Debit Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <button type="submit" name="make_payment" class="btn btn-main btn-round-full"
                                style="margin-right: 15px;">
                                Make Online Payment <i class="icofont-simple-right ml-2"></i>
                            </button>
                            <button type="submit" name="pay_later" class="btn btn-main btn-round-full">
                                Pay to Counter <i class="icofont-simple-right ml-2"></i>
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'Footer.php'; ?>