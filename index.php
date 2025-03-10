<?php
    include_once 'Header.php';
?>
<!-- Search Bar -->
<div class="col-12">
    <div class="d-flex justify-content-end position-relative">
        <input type="text" id="searchQuery" class="form-control col-lg-3" placeholder="Search for services..."
            onkeyup="searchService()">
        <div id="searchResults"></div>
    </div>
</div>


<script>
function searchService() {
    var query = document.getElementById("searchQuery").value;
    var searchResults = document.getElementById("searchResults");

    if (query.length < 2) {
        searchResults.innerHTML = "";
        searchResults.style.display = "none";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "include/search.inc.php?query=" + encodeURIComponent(query), true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            searchResults.innerHTML = xhr.responseText;
            searchResults.style.display = "block"; // Show results
        }
    };

    xhr.send();
}

// Hide search results when clicking outside
document.addEventListener("click", function(event) {
    var searchBox = document.getElementById("searchQuery");
    var searchResults = document.getElementById("searchResults");

    if (!searchBox.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.style.display = "none";
    }
});

function redirectToService(type, id) {
    window.location.href = "service.php?type=" + encodeURIComponent(type) + "&id=" + encodeURIComponent(id);
}
</script>


<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <br><br>
                <div class="block" style="text-align: left;">
                    <div class="divider mb-3"></div>
                    <span class="text-uppercase text-sm letter-spacing" style="color:rgb(0, 0, 0);">
                        Your Complete Health Care Partner
                    </span>

                    <h1 class="mb-3 mt-3">
                        Empowering Your Journey to Better Health
                    </h1>
                    <h4 class="mb-4 pr-4" style="color: darkred;">
                        We are committed to providing compassionate, professional,
                        and reliable health care services to help you achieve a healthier and happier life.
                    </h4>

                    <br><br><br><br>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-surgeon-alt"></i>
                        </div>
                        <span>24 Hours Service</span>
                        <h4 class="mb-3">Online Appoinment</h4>
                        <p class="mb-4">
                            Get All time support for emergency.We have introduced the
                            principle of family medicine.
                        </p>
                        <a href="Appointment.php" target="_blank" class="btn btn-main btn-round-full">
                            Make an Appoinment</a>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Time schedule</span>
                        <h4 class="mb-3">OPD Working Hours</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">
                                Mon - Fri : <span>6:00 - 23:00</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                Sat - Sun : <span>6:00 - 21:00</span>
                            </li>
                        </ul>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <a href="tel:5959">
                                <i class="icofont-support"></i>
                        </div>
                        <span>Emegency Cases</span>
                        <h2 class="mb-3">Call 5959</h2>
                        </a>

                        Get all time support for emergency.We have introduced the
                        principle of family medicine.Get Conneted with us for any
                        urgency .
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6">
                <div class="about-img">
                    <img src="images/about/img1.jpg" alt="" class="img-fluid" />
                    <img src="images/about/img2.jpg" alt="" class="img-fluid mt-4" />
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="about-img mt-4 mt-lg-0">
                    <img src="images/about/img3.jpg" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color">Personal care <br>& healthy living</h2>
                    <p class="mt-4 mb-5">
                        We provide best leading medicle service Nulla perferendis veniam
                        deleniti ipsum officia dolores repellat laudantium obcaecati
                        neque.
                    </p>

                    <a href="Service.php" class="btn btn-main-2 btn-round-full btn-icon">Services<i
                            class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3" data-count="15000">15</span>k
                        <p>Happy People</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-flag"></i>
                        <span class="h3" data-count="500">500</span>+
                        <p>Surgery Completed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-badge"></i>
                        <span class="h3" data-count="40">40</span>+
                        <p>Expert Doctors</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-globe"></i>
                        <span class="h3" data-count="3">3</span>
                        <p>Local Branches</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section service gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Award winning patient care</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>
                        Lets know moreel necessitatibus dolor asperiores illum possimus
                        sint voluptates incidunt molestias nostrum laudantium. Maiores
                        porro cumque quaerat.
                    </p>
                </div>
            </div>
        </div>
</section>

<!-- about section-->
<section id="about" class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">About Us</span>
                    <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section about-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="title-color">Dedicated to Your Health, Committed to Your Care</h2>
            </div>
            <div class="col-lg-8">
                <p style="text-align: justify;">
                    <span style="font-size: 24px;"><b>Welcome to Care Compass Hospitals!</b></span>
                    <br />
                    We are a trusted network of hospitals, proudly serving communities across
                    Kandy, Colombo, and Kurunegala. Our mission is simple: to provide you with
                    the highest quality healthcare, backed by compassion and professionalism.
                    <br />
                    At Care Compass, we believe healthcare is more than just treating
                    illnesses. It’s about improving your overall well-being. Our skilled
                    doctors, nurses, and medical staff work together to deliver personalized
                    care that meets your unique needs.
                    <br><br>
                    <span style="font-size: 18px;"><b>Why Choose Us?</b></span>
                <ul>
                    <li><strong>Experienced Healthcare Professionals:</strong> Our doctors and staff are
                        highly trained, dedicated, and passionate about helping you stay healthy.
                    </li>
                    <li>
                        <strong>Comprehensive Care:</strong> Whether you need treatment, advice, or
                        a routine check-up, we are here to support you every step of the way.
                    </li>
                    <li>
                        <strong>State-of-the-Art Facilities:</strong> We use the latest technology
                        to ensure you receive the best possible care.
                    </li>
                </ul>
                <br>
                <span style="font-size: 20px;"><b>Our Promise to You!</b></span>
                <br>
                We’re committed to making healthcare easier and more accessible. From
                the moment you step into our hospitals or visit our website, you’ll
                experience a caring and efficient environment where your health comes first.
                <br>
                Thank you for choosing Care Compass Hospitals. We’re honored to be part
                of your health journey. Explore more about how we can serve you today!
                </p>

                <img src="images/about/sign.png" alt="" class="img-fluid" />
            </div>
        </div>
    </div>
</section>

<section class="section awards">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <h2 class="title-color">Our Doctors achievements</h2>
                <div class="divider mt-4 mb-5 mb-lg-0"></div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="images/about/3.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="images/about/4.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="images/about/1.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="images/about/2.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="images/about/5.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="award-img">
                            <img src="images/about/6.png" alt="" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="mb-4">Meet Our Specialist</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>
                    A team of highly skilled professionals committed to providing expert care, 
                    personalized treatments, and compassionate support to ensure your well-being.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-lg-4">
            <a href="DoctorTab.php" class="btn btn-main btn-round-full">See Today Avialable Doctors</a>
        </div>
    </div>

</section>

<section class="section testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="section-title">
                    <a href="Feedback.php" class="btn btn-main btn-round-full">
                        <h3 style="color: white;">See What they say about us<i
                                class="icofont-simple-right ml-3 mb-4"></i>
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once 'Footer.php';
    ?>