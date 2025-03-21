<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    echo '<div style="position: absolute; top: 10px; right: 10px;">';

    //for show name for logged in members
    if (isset($_SESSION['username'])) {
        echo '<div class="dropdown">
            <h3><a class="nav-link dropdown-toggle text-white" href="#" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi! ' . htmlspecialchars($_SESSION['username']) . '
            </a></h3>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item text-white bg-dark" href="MyProfile.php">My Profile</a></li>
                <li><a class="dropdown-item text-white bg-dark" href="Logout.php">Logout</a></li>
            </ul>
          </div>';
    } else {
        echo '<a href="Login.php" class="nav-link text-white">Login</a>';
    }

    echo '</div>';
?>



<script>
function toggleDropdown() {
    var dropdown = document.getElementById("dropdownMenu");
    dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
}

window.onclick = function(event) {
    if (!event.target.matches("button")) {
        var dropdown = document.getElementById("dropdownMenu");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
};
</script>



<!DOCTYPE html>
<html lang="eng">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Care Compass Hospitals</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="plugins/bootstrap/css/font/bootstrap-icons.css" />
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css" />
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body id="top">
    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item">
                                <a href="mailto:support@cchospitals.lk"><i
                                        class="icofont-support-faq mr-2"></i>support@cchospitals.lk</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="icofont-location-pin mr-2"></i>Kandy | Colombo | Kurunegala
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="top-right-bar mt-2 mt-lg-0">
                            <a href="tel:5959">
                                <i class="bi bi-telephone-plus"></i>
                                <span class="h4">Emergency Call : </span>
                                <span class="h3">5959</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/CCH_LOGO.png" alt="logo" class="img-fluid" />
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                    aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icofont-navigation-menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="index.php#about">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="service.php" id="dropdown03"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services <i
                                    class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li>
                                    <a class="dropdown-item" href="service.php">See Our Services</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" target="_blank" href="LabPayment.php">Make a Payment</a>
                                </li>
                            </ul>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="doctorTab.php" id="dropdown03"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Doctors <i
                                    class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li>
                                    <a class="dropdown-item" href="doctorTab.php">Available Doctors Today!</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" target="_blank" href="Appointment.php">Make an
                                        Appointment</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="Feedback.php" id="dropdown05"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Feedbacks <i
                                    class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown05">
                                <li>
                                    <a class="dropdown-item" href="Feedback.php">View Feedbacks</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="AddFeedback.php">Add Yours</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <button id="scrollToTop" class="backtop js-scroll-trigger" style="display: none;">
        <i class="icofont-arrow-up"></i>
    </button>

    <script>
    const scrollToTopBtn = document.getElementById("scrollToTop");

    window.onscroll = function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };

    scrollToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    </script>