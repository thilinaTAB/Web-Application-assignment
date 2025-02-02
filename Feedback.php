<?php
include_once 'Header.php';
require_once 'Include/dbh.inc.php'; // Database connection
?>

<section class="section testimonial">
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
        <?php
        // Fetch feedback from the database
        $sql = "SELECT FbName, Topic, FbNote FROM feedback ORDER BY FbID DESC";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
          die("SQL Error: " . mysqli_error($conn)); // Debugging: Display SQL error
        }

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="testimonial-block">
                    <div class="client-info">
                      <h4>' . htmlspecialchars($row["Topic"]) . '</h4>
                      <span>' . htmlspecialchars($row["FbName"]) . '</span>
                    </div>
                    <p>' . htmlspecialchars($row["FbNote"]) . '</p>
                    <i class="icofont-quote-right"></i>
                  </div>';
          }
        } else {
          echo "<p>No feedback available yet.</p>";
        }

        mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6">
        <div class="section-title d-flex flex-column justify-content-center align-items-center">
          <a
            href="AddFeedback.php"
            class="btn btn-main-2 btn-round-full btn-icon"
          >
            Add Yours
          </a>
          <div class="divider mx-auto my-4"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once 'Footer.php'; ?>
