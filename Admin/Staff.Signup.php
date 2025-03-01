<?php
    include_once 'Admin.Header.php';
?>
<section class="bg-light py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-sm">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <a href="#!">
                                <img src="../images/CCH_LOGO.png" alt="Logo" width="auto" height="auto">
                            </a>
                        </div>
                        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Create Staff account</h2>
                        <form action="../Include/Staff.Signup.inc.php" method="post">
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="sName" id="sName"
                                            placeholder="Full Name" required>
                                        <label for="uname" class="form-label">Member Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="sNIC" id="sNIC" placeholder="NIC"
                                            required>
                                        <label for="email" class="form-label">National Identity Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" name="sContact" id="sContact"
                                            placeholder="Mobile Number" required>
                                        <label for="email" class="form-label">Contact Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="staffId" id="staffId"
                                            placeholder="Staff ID" required>
                                        <label for="email" class="form-label">Staff ID Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="staffMail" id="staffMail"
                                            placeholder="staffId@cch.com" required>
                                        <label for="email" class="form-label">Staff Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="sRole" id="sRole"
                                            placeholder="Position" required>
                                        <label for="userid" class="form-label">Position</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="sPassword" id="sPassword"
                                            placeholder="Password" required>
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="sRepassword" id="sRepassword"
                                            placeholder="Repeat Password" required>
                                        <label for="repassword" class="form-label">Repeat Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid my-3 text-center">
                                        <button class="btn btn-primary btn-lg" name="submit" type="submit">Create
                                            Account</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="m-0 text-secondary text-center"><a href="StaffList.php"
                                            class="link-primary text-decoration-none">Go Back to Dashboard</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>