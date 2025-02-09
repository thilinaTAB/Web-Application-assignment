<?php
    include_once 'header.php';
?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Contact Us</span>
          <h1 class="text-capitalize mb-5 text-lg">Get in Touch</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section contact-info pb-0">
    <div class="container">
         <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
            <a href="tel:+94 11 59 59 999">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-live-support"></i>
                    <h5>Call Us</h5>
                    +94 11 59 59 999</a>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                <a href="mailto:support@cchospitals.lk">
                    <i class="icofont-support-faq"></i>
                    <h5>Email Us</h5>
                    support@cchospitals.lk</a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Kandy Hospital</h5>
                     185/B, Peradeniya rd, Kandy
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Colombo Hospital</h5>
                     185/B, Peradeniya rd, Kandy
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Kurunegala Hospital</h5>
                     185/B, Peradeniya rd, Kandy
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Quaries-->
<br><br>
      <div class="col-lg-12 col-sm-6 col-md-6">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">How Can We Help You?</h2>
               <form id="q-form" class="appoinment-form" method="post"
               action="Include\Quaries.inc.php" onsubmit="return confirmSubmission();">
                    <div class="row">
                    <div class="col-lg-9">
                            <div class="form-group">
                                <input name="Qname" id="Qname" type="text" class="form-control"
                                placeholder="Your Name" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="Qemail" id="Qemail" type="Email" class="form-control"
                                placeholder="Email" required>
                            </div>
                        </div>
                        <br>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="Qphone" id="Qphone" type="tel" class="form-control"
                                placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="Qtitle" id="Qtitle" type="text" class="form-control"
                                placeholder="Subject" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-groupform-group-2 mb-4">
                                <textarea name="Qbody" id="Qbody" type="text" class="form-control"
                                rows="8" placeholder="Your Message" required> </textarea>
                            </div>
                        </div>

                    <button type="submit" name="submit" class="btn btn-main btn-round-full">
                      Submit<i class="icofont-simple-right ml-2"></i></button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>


// Show popup if query was successfully submitted
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success') && urlParams.get('success') === 'queriessubmitted') {
        alert("Thank you. We will respond you soon! 😊");
        setTimeout(function() {
            window.location.href = "Contact.php";
        }, 500); // Wait 500ms before redirecting
    }
};
</script>

<?php
include_once 'Footer.php';
?>