<?php
    session_start();

    // Check if the user is logged in
    if (! isset($_SESSION["userid"])) {
        echo '<script>
            alert("Please login to make an Payment.");
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
          <span class="text-white">Pay your bills on your finger tip</span>
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
            <a href="tel:+94 11 59 59 999">
            <span class="h3">Call for Live Agent!</span>
              <h2 class="text-color mt-3">+94 11 59 59 999 </h2> </a>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Payments for Lab Repots</h2>
            <p class="mb-4">Please select your required service correctly. Do not refund after payments.</p>
               <form id="payment-form" class="appoinment-form" method="post"
               action="Include/LabPayment.inc.php" onsubmit="return confirmSubmission();">
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
                                        // Include the database connection file (now pointing to cch_hospitals)
                                        include_once 'Include/dbh.inc.php';

                                        // Query to fetch doctors with their id, name, and specialty
                                        $sql    = "SELECT labserv_id, test_name, price FROM laboratory_services";
                                        $result = mysqli_query($conn, $sql);

                                        // Check if there are results
                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row and create an option tag
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Combine doctor name with specialty
                                                $doctorInfo = $row['test_name'] . " - " . $row['price'];
                                                echo "<option value='" . $row['labserv_id'] . "'>" . $doctorInfo . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No doctors available</option>";
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

                        <!-- The appointment time field is kept in the form for now,
                             but note it is not used in the new database schema -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="paytype" name="paytype" required>
                                  <option value="">Select Payment method </option>
                                  <option>Credit Card</option>
                                  <option>Debit Card</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <button type="submit" name="paysubmit" class="btn btn-main btn-round-full">
                      Make Payment<i class="icofont-simple-right ml-2"></i></button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function confirmSubmission() {
    // Gather form data
    const name = document.getElementById("name").value;
    const age = document.getElementById("age").value;
    const phone = document.getElementById("phone").value;
    const email = document.getElementById("email").value;
    const doctorSelect = document.getElementById("doctor");
    const doctorName = doctorSelect.options[doctorSelect.selectedIndex].text;
    const branch = document.getElementById("branch").value;
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;

    // Construct the confirmation message
    const confirmationMessage = `
        Please confirm your appointment details:
        Name: ${name}
        Age: ${age}
        Phone: ${phone}
        Email: ${email}
        Doctor ID: ${doctor}
        Branch: ${branch}
        Date: ${date}
        Time: ${time}
    `;

    // Show confirmation dialog
    if (confirm(confirmationMessage)) {
        // Show success alert after submission
        alert("Appointment submitted successfully!\nWe will contact you soon to verify your appointment");
        // Submit the form
        document.getElementById("appointment-form").submit();
        window.close();
    }
}
</script>

<?php
    include_once 'Footer.php';
?>
