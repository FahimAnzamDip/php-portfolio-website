<?php
// require_once "admin/includes/db.php";

  $show_stats_query = "SELECT * FROM stats LIMIT 4";
  $show_stats = mysqli_query($connection, $show_stats_query);
  if (!$show_stats) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  }
?>

<section class="stat-section section-gap-half">
  <div class="container">
    <div class="row">
      <?php foreach ($show_stats as $stat): ?>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-stat">
          <i class="<?= $stat['stat_icon']; ?>"></i>
          <h1>
            <span class="counter"><?= $stat['stat_number']; ?></span>+</h1>
          <h4><?= $stat['stat_title']; ?></h4>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>