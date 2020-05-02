<?php
// require_once "admin/includes/db.php";

  $show_services_query = "SELECT * FROM services";
  $show_services = mysqli_query($connection, $show_services_query);
  if (!$show_services) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  }
?>

<section class="service-section section-gap-full">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center">My Services</h2>
            <p class="text-center">Discover The Service I Can Provide</p>
        </div>
        <div class="row owl-carousel" id="service-carusel">
            <?php foreach($show_services as $service): ?>
            <div class="single-service">
                <i class="<?= $service['service_icon']; ?>"></i>
                <h4><?= $service['service_title']; ?></h4>
                <p>
                  <?= $service['service_content']; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>