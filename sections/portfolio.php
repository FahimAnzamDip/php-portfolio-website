<?php
// require_once "admin/includes/db.php";

$show_portfolios_query = "SELECT * FROM portfolios ORDER BY portfolio_id desc LIMIT 6";
$show_portfolios = mysqli_query($connection, $show_portfolios_query);
if (!$show_portfolios) {
  die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
}
?>

<section class="portfolio-section section-gap-full" id="feature-section">
  <div class="container">
    <div class="section-title">
      <h2 class="text-center">My Featured Works</h2>
      <p class="text-center">Some of Our Project we have done so far.</p>
    </div>
    <div class="row justify-content-center">
      <?php foreach ($show_portfolios as $portfolio) : ?>
        <div class="col-lg-4 col-md-6">
          <div class="single-portfolio">
            <img class="img-fluid" src="admin/assets/images/portfolio_img/<?= $portfolio['portfolio_image']; ?>" alt="">
            <div class="box-content">
              <a href="s#">
                <h5 class="title"><?= $portfolio['portfolio_title']; ?></h5>
              </a>
              <span class="post"><?= $portfolio['portfolio_category']; ?></span>

              <ul class="d-flex justify-content-center p-3">
                <li class="mr-4">
                  <a style="font-size: 20px;" href="#" class="text-white" target="_blank"><i class="fa fa-eye"></i></a>
                </li>
                <li>
                  <a style="font-size: 20px;" href="<?= $portfolio['portfolio_link']; ?>" class="text-white" target="_blank"><i class="fa fa-external-link"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>