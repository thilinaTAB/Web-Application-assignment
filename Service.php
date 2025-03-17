<?php
    include_once 'Header.php';
    require 'Include/dbh.inc.php';

    $service_name        = "";
    $service_description = "";

    if (isset($_GET['type']) && isset($_GET['id'])) {
        $type = $_GET['type'];
        $id   = intval($_GET['id']);

        //service type
        if ($type === 'hospital') {
            $sql = "SELECT service_name AS name, description FROM hospital_services WHERE hospserv_id = ?";
        } elseif ($type === 'laboratory') {
            $sql = "SELECT test_name AS name, test_description AS description FROM laboratory_services WHERE labserv_id = ?";
        } else {
            $service_name        = "Our Services";
            $service_description = "Explore our wide range of healthcare services.";
        }

        if (! empty($sql)) {
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die('SQL Error: ' . $conn->error);
            }
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $service_name        = htmlspecialchars($row['name']);
                $service_description = htmlspecialchars($row['description']);
            } else {
                $service_name        = "Service Not Found";
                $service_description = "The service you are looking for does not exist.";
            }
            $stmt->close();
        }
    } else {
        $service_name        = "Our Services";
        $service_description = "Explore our wide range of healthcare and laboratory services.";
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
                    <h1 class="text-capitalize mb-5 text-lg">
                        <?php echo $service_name; ?>
                    </h1>
                    <p class="text-white"><?php echo $service_description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section service-2">
<section>
    <div class="block text-center col-lg-12">
        <h3>Hospital Services</h3>
        <br>
    </div>
</section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-1.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Child care</h4>
                        <p class="mb-4">
                            Paediatrics provides specialized care for infants, children,
                            and adolescents, focusing on their physical, emotional, and developmental
                            health. Paediatricians diagnose and treat various childhood illnesses,
                            offer vaccinations, monitor growth, and guide parents on nutrition and
                            well-being. The goal is to ensure healthy development and prevent
                            illnesses through tailored care.
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
                    <img src="images/service/service-5.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Cardiology</h4>
                        <p class="mb-4">
                            Cardiology specializes in diagnosing, treating, and preventing
                            heart diseases like coronary artery disease, heart failure, and
                            arrhythmias. Using advanced tools like ECGs and echocardiograms,
                            cardiologists assess heart function and recommend treatments,
                            including lifestyle changes, medications, or surgeries like angioplasty.
                            The focus is on improving heart health and managing risk factors
                            for a better quality of life.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5 mb-lg-0">
                    <img src="images/service/service-4.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Mental Health & Counselling</h4>
                        <p class="mb-4">
                            Offers psychiatric and psychological support for individuals facing stress,
                            anxiety, depression, or other mental health challenges. Counselling sessions
                            and therapy programs are designed to promote emotional well-being and recovery.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5 mb-lg-0">
                    <img src="images/service/service-6.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Maternity & Neonatal Care</h4>
                        <p class="mb-4">
                            Provides comprehensive care for expecting mothers,
                            ensuring safe pregnancies, smooth deliveries, and proper postnatal
                            support. Newborns receive specialized attention, including neonatal
                            intensive care if needed.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5 mb-lg-0">
                    <img src="images/service/service-3.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">CT scan</h4>
                        <p class="mb-4">
                            Our CT Scan (Computed Tomography) service provides
                            high-quality, cross-sectional imaging to assist in diagnosing
                            various medical conditions. Using advanced technology, our CT
                            scans help detect abnormalities in the brain, chest, abdomen,
                            and more. The procedure is quick, painless, and ensures precise
                            results for better medical evaluation.
                        </p>
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
                    <img src="images/service/service-9.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Complete Blood Count (CBC)</h4>
                        <p class="mb-4">A blood test to evaluate overall health and detect disorders.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-12.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Lipid Profile</h4>
                        <p class="mb-4">Measures cholesterol and triglyceride levels.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-9.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Liver Function Test</h4>
                        <p class="mb-4">Tests to assess liver health and detect liver diseases.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-9.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Blood Sugar Test</h4>
                        <p class="mb-4">Determines blood glucose levels for diabetes screening.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-10.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">Urine Analysis</h4>
                        <p class="mb-4">Examines urine for infections, kidney disease, and other conditions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-block mb-5">
                    <img src="images/service/service-7.jpg" alt="" class="img-fluid" />
                    <div class="content">
                        <h4 class="mt-4 mb-2 title-color">COVID-19 PCR Test</h4>
                        <p class="mb-4">Detects the presence of SARS-CoV-2 virus.</p>
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
                    <a href="Appointment.php" class="btn btn-main-2 btn-round-full">Get appointment
                        <i class="icofont-simple-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once 'Footer.php';
?>