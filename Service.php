<?php
    include_once 'Header.php';
    require 'Include\dbh.inc.php';

    $service_name        = "";
    $service_description = "";

    // Check if type and ID are set in the URL
    if (isset($_GET['type']) && isset($_GET['id'])) {
        $type = $_GET['type'];
        $id   = intval($_GET['id']); // Ensure ID is an integer

        // Define the appropriate query based on service type
        if ($type === 'hospital') {
            $sql = "SELECT service_name AS name, description FROM hospital_services WHERE id = ?";
        } elseif ($type === 'laboratory') {
            $sql = "SELECT test_name AS name, test_description AS description FROM laboratory_services WHERE id = ?";
        } elseif ($type === 'emergency') {
            $sql = "SELECT service_name AS name, availability AS description FROM emergency_services WHERE id = ?";
        } else {
            echo "<div class='container'><h3>Invalid service type.</h3></div>";
            include_once 'Footer.php';
            exit;
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $service_name        = htmlspecialchars($row['name']);
            $service_description = htmlspecialchars($row['description']);
        } else {
            echo "<div class='container'><h3>Service not found.</h3></div>";
            include_once 'Footer.php';
            exit;
        }

        $stmt->close();
    }

    $conn->close();
?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Our services</span>
                    <h1 class="text-capitalize mb-5 text-lg"><?php echo $service_name ? $service_name : "What We Do"; ?></h1>
                    <p class="text-white"><?php echo $service_description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
<div class="block text-center col-lg-12">
         <br> <h3>Hospital Services</h3>
          </div>
</section>



<section class="section service-2">
    <div class="container">
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
                        <img src="images/service/service-1.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Child care</h4>
                            <p class="mb-4">
                              Dedicated to providing specialized medical care for infants,
                              children, and adolescents, paediatrics focuses on the physical,
                              emotional, and developmental health of young patients. Paediatricians
                              diagnose and treat a wide range of childhood illnesses, from common
                              infections to more complex health conditions. The service also includes
                              regular health check-ups, vaccinations, growth and development
                              monitoring, and guidance for parents on nutrition, safety, and mental
                              well-being. The goal is to promote healthy growth and prevent illness
                              through tailored care for younger populations.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
                        <img src="images/service/service-2.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Personal Care</h4>
                            <p class="mb-4">
                              Offers professional medical advice, diagnosis,
                              and treatment for a wide range of common health conditions.
                              The service is typically aimed at addressing acute and chronic
                              illnesses, as well as providing preventive care. Doctors assess
                              symptoms, perform physical exams, and may recommend further tests
                              or treatments. This service is often the first point of contact for
                              individuals seeking healthcare, ensuring timely interventions for
                              various health concerns.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
                        <img src="images/service/service-2.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Cardiology</h4>
                            <p class="mb-4">
                            Cardiology focuses on the diagnosis, treatment, and prevention of heart
                            diseases and cardiovascular conditions. This specialized service covers
                            a wide range of heart-related issues, including coronary artery disease,
                            heart failure, arrhythmias, and hypertension. Cardiologists use advanced
                            diagnostic tools such as ECGs, echocardiograms, and stress tests to evaluate
                            heart function. Treatment may involve lifestyle changes, medications, or
                            surgical interventions such as angioplasty or heart surgery. The goal is
                            to improve heart health, manage risk factors, and enhance the quality of
                            life for patients with cardiovascular concerns.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5 mb-lg-0">
                        <img src="images/service/service-4.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Joint replacement</h4>
                            <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5 mb-lg-0">
                        <img src="images/service/service-6.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Examination & Diagnosis</h4>
                            <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5 mb-lg-0">
                        <img src="images/service/service-8.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">Alzheimer's disease</h4>
                            <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>


<section>
<div class="block text-center col-lg-12">
          <h3>Laborotory Services</h3>
          </div>
</section>



<section class="section service-2">
    <div class="container">
        <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
                        <img src="images/service/service-3.jpg" alt="" class="img-fluid" />
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color">CT scan</h4>
                            <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>


<section class="section cta-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="cta-content">
                    <div class="divider mb-4"></div>
                    <h2 class="mb-5 text-lg">
                        We are pleased to offer you the
                        <span class="title-color">chance to have the healthy</span>
                    </h2>
                    <a href="Appointment.php" class="btn btn-main-2 btn-round-full">Get appointment<i class="icofont-simple-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once 'Footer.php';
?>
