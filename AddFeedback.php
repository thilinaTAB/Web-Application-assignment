<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["userid"])) {
    header("location:Login.php?error=notloggedin");
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
          <span class="text-white">Access Quality Healthcare Services Online</span>
          <h1 class="text-capitalize mb-5 text-lg">Feedbacks</h1>
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
            <h2 class="mb-2 title-color">Every Voice Counts – Share Yours Today! 😊</h2>
            <h3 class="mb-4">Thanks For Choosing Us!</h3>
               <form id="fb-form" class="appoinment-form" method="post" 
               action="Include/Feedbac.inc.php" onsubmit="return confirmSubmission();">
                    <div class="row">
                    <div class="col-lg-9">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" 
                                placeholder="Your Name" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="FbTitle" id="FbTitle" type="text" class="form-control" 
                                placeholder="Key Topic" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-groupform-group-2 mb-4">
                                <textarea name="fbNote" id="fbNote" type="text" class="form-control" 
                                placeholder="Go Ahead" required> </textarea>
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


// Show popup if feedback was successfully submitted
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success') && urlParams.get('success') === 'feedbacksubmitted') {
        alert("Thank you for your feedback! 😊");
        window.location.href = "feedback.php";
    }
};
</script>


<?php 
include_once 'Footer.php';
?> 
