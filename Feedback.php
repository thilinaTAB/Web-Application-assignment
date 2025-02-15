<?php
    include_once 'Header.php';
    require_once 'Include/dbh.inc.php';
?>
<section class="section testimonial2">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6">
        <div class="section-title">
          <h2 class="mb-4">What they say about us</h2>
          <div class="divider my-4"></div>
        </div>
      </div>
    </div>

    <div class="row align-items-center">
  <div class="col-lg-6 testimonial-wrap offset-lg-6">
    <div id="feedbackCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php
            $sql    = "SELECT fb_username, feedback_topic, feedback_note FROM feedback ORDER BY feedback_id DESC";
            $result = mysqli_query($conn, $sql);

            if (! $result) {
                die("SQL Error: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) > 0) {
                $active = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">
                            <div class="testimonial-block">
                              <div class="client-info">
                                <h4>' . htmlspecialchars($row["feedback_topic"]) . '</h4>
                                <span>' . htmlspecialchars($row["fb_username"]) . '</span>
                              </div>
                              <p>' . htmlspecialchars($row["feedback_note"]) . '</p>
                              <i class="icofont-quote-right"></i>
                            </div>
                          </div>';
                    $active = false;
                }
            } else {
                echo '<div class="carousel-item active"><p>No feedback available yet.</p></div>';
            }

            mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
</div>


  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6">
        <div class="section-title d-flex flex-column justify-content-center align-items-center">
          <a href="AddFeedback.php" class="btn btn-main-2 btn-round-full btn-icon">
            Add Yours
          </a>
          <div class="divider mx-auto my-4"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once 'Footer.php'; ?>
