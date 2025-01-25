<?php
include_once 'Header.php';
?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Access Quality Healthcare Services Online</span>
          <h1 class="text-capitalize mb-5 text-lg">Book Your Doctor's Appointment</h1>
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
            <h2 class="mb-2 title-color">Book an appoinment</h2>
            <p class="mb-4">Please provide correct details for offer you a Quality Service </p>
               <form id="appointment-form" class="appoinment-form" method="post" 
               action="Include/Appointment.inc.php" onsubmit="return confirmSubmission();">
                    <div class="row">
                    <div class="col-lg-6">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" 
                                placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="age" id="age" type="Number" class="form-control" 
                                placeholder="Your Age" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone" id="phone" type="Number" class="form-control" 
                                placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="Email" class="form-control" 
                                placeholder="Email" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="doctor" name="doctor" required>
                                  <option value="">Select Doctors</option>
                                  <option>AAA</option>
                                  <option>BBB</option>
                                  <option>CCC</option>
                                  <option>DDD</option>
                                  <option>EEE</option>
                                  <option>FFF</option>
                                  <option>GGG</option>
                                </select>
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="doctorSpec" name="doctorSpec" required>
                                  <option value="">Choose Specialization</option>
                                  <option>Cardiologist</option>
                                  <option>Neurologist</option>
                                  <option>Dermatologist</option>
                                  <option>Pediatrician</option>
                                  <option>Orthopedic Surgeon</option>
                                  <option>Oncologist</option>
                                  <option>Endocrinologist</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="branch" name="branch" required>
                                  <option value="">Select Branch</option>
                                  <option>Kandy</option>
                                  <option>Colombo</option>
                                  <option>Kurunegala</option>
                                </select>
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="date" id="date" type="Date" class="form-control" 
                                placeholder=" Date (dd/mm/yyyy)" required>
                            </div>
                        </div>               

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="time" name="Apptime" required>
                                  <option value="">Select Session </option>
                                  <option>Morning Session (8.00-10.00)</option>
                                  <option>Evening Session (16.00-18.00)</option>
                                  <option>Night Session (21.00-23.00)</option>
                                  </select>
                            </div>
                        </div>

                    </div>

                    <button type="submit" name="submit" class="btn btn-main btn-round-full">
                      Make Appointment<i class="icofont-simple-right ml-2"></i></button>
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
    const doctor = document.getElementById("doctor").value;
    const doctorSpec = document.getElementById("doctorSpec").value;
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
        Doctor: ${doctor}
        Specialization: ${doctorSpec}
        Branch: ${branch}
        Date: ${date}
        Time: ${time}
    `;

    // Display the confirmation dialog
    return confirm(confirmationMessage);
}
</script>

<?php 
include_once 'Footer.php';
?> 
