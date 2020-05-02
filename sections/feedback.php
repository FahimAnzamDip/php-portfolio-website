<?php
// require_once "admin/includes/db.php";

$show_feedbacks_query = "SELECT * FROM feedbacks ORDER BY feedback_id desc";
$show_feedbacks = mysqli_query($connection, $show_feedbacks_query);
if (!$show_feedbacks) {
  die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
}
?>

<section class="testimonial-section section-gap-full offwhite-bg" id="testimonial-section">
  <div class="container">
    <div class="section-title">
      <h2 class="text-center">Testimonals</h2>
      <p class="text-center">See what people says about us.</p>
    </div>
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8">
        <div class="testimonial-carusel carusel-two owl-carousel" id="testimonial-carusel2">
          <?php foreach ($show_feedbacks as $feedback) : ?>
            <div>
              <div class="single-testimonial testimonial-white-bg item">
                <p>
                  <?= $feedback['feedback_content']; ?>
                </p>
                <div class="user-details d-flex flex-row align-items-center">
                  <div class="img-wrap">
                    <img style="height:60px; width:60px; border-radius:50%;" src="admin/assets/images/feedback_img/<?= $feedback['feedback_image']; ?>" alt="">
                  </div>
                  <div class="details">
                    <h4><?= $feedback['feedback_title']; ?></h4>
                    <p><?= $feedback['feedback_sub_title']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>