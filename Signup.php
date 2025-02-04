<?php
include_once 'Header.php';
?>

<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="images/CCH_LOGO.png" alt="Logo" width="auto" height="auto">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Create your account</h2>
            <form action="Include/Signup.inc.php" method="post">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="uname" id="uname" placeholder="Name" required>
                    <label for="uname" class="form-label">Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="userid" id="userid" placeholder="Username" required>
                    <label for="userid" class="form-label">Username</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Repeat Password" required>
                    <label for="repassword" class="form-label">Repeat Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3 text-center">
                    <button class="btn btn-primary btn-lg" name="submit" type="submit">Sign Up</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Already have an account? <a href="Login.php" class="link-primary text-decoration-none">Login</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once 'Footer.php';
?>