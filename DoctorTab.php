<?php
include_once 'Header.php';
?>

<section class="page-title bg-1">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block text-center">
              <span class="text-white">All Doctors</span>
              <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>

              <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- portfolio -->
    <section class="section doctors">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-title">
              <h2>Doctors</h2>
              <div class="divider mx-auto my-4"></div>
              <p>
                We provide a wide range of creative services adipisicing elit.
                Autem maxime rem modi eaque, voluptate. Beatae officiis neque
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 text-center mb-5">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn active">
              <input
                type="radio"
                name="shuffle-filter"
                value="all"
                checked="checked"
              />All Department
            </label>
            <label class="btn">
              <input
                type="radio"
                name="shuffle-filter"
                value="cat1"
              />Cardiology
            </label>
            <label class="btn">
              <input type="radio" name="shuffle-filter" value="cat2" />Dental
            </label>
            <label class="btn">
              <input type="radio" name="shuffle-filter" value="cat3" />Neurology
            </label>
            <label class="btn">
              <input type="radio" name="shuffle-filter" value="cat4" />Medicine
            </label>
            <label class="btn">
              <input type="radio" name="shuffle-filter" value="cat5" />Pediatric
            </label>
            <label class="btn">
              <input
                type="radio"
                name="shuffle-filter"
                value="cat6"
              />Traumatology
            </label>
          </div>
        </div>

        <div class="row shuffle-wrapper portfolio-gallery">
          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat1","cat2"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/1.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  homas Henry
                </h4>
                <p>Cardiology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat2"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/2.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Harrision Samuel</a>
                </h4>
                <p>Radiology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat3"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/3.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Alexandar James</a>
                </h4>
                <p>Dental</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat3","cat4"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/4.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Edward john</a>
                </h4>
                <p>Pediatry</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat5"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/1.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Thomas Henry</a>
                </h4>
                <p>Neurology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat6"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/3.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Henry samuel</a>
                </h4>
                <p>Palmology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat4"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/1.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Thomas alexandar</a>
                </h4>
                <p>Cardiology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat5","cat6","cat1"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/3.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">HarissonThomas </a>
                </h4>
                <p>Traumatology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item illustration"
            data-groups='["cat2"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/4.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Jonas Thomson</a>
                </h4>
                <p>Cardiology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item"
            data-groups='["cat5","cat6","cat1"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/3.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Henry Forth</a>
                </h4>
                <p>hematology</p>
              </div>
            </div>
          </div>

          <div
            class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item illustration"
            data-groups='["cat2"]'
          >
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                <div class="doctor-img">
                  <img
                    src="images/team/4.jpg"
                    alt="doctor-image"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="content mt-3">
                <h4 class="mb-0">
                  <a href="doctor-single.html">Thomas Henry</a>
                </h4>
                <p>Dental</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /portfolio -->
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
              <a href="appoinment.html" class="btn btn-main-2 btn-round-full"
                >Get appoinment<i class="icofont-simple-right ml-2"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
include_once 'Footer.php';
?>