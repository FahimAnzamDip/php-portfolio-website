<?php
// require_once "admin/includes/db.php";

  $show_educations_query = "SELECT * FROM educations LIMIT 4";
  $show_educations = mysqli_query($connection, $show_educations_query);
  if (!$show_educations) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  }
?>

<section class="feature-section section-gap-full">
  <div class="container">
    <div class="row align-items-center feature-wrap">
      <div class="col-lg-4 header-left">
        <h1>
          Education
          <br>and Experiences
        </h1>
        <!-- <a class="primary-btn" href="#about-section">Know More
                    <span class="ti-arrow-right"></span>
                </a> -->
      </div>
      <div class="col-lg-8">
        <div class="row features-wrap">
          <?php foreach ($show_educations as $education): ?>
          <div class="col-md-6">
            <div class="single-feature relative">
              <div class="overlay overlay-bg"></div>
              <span class="<?= $education['education_icon']; ?>"></span>
              <h3><?= $education['education_title']; ?></h3>
              <h5><?= $education['education_length']; ?></h5>
              <p>
                <?= $education['education_content']; ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>