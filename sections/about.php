<?php
$select_about_query = "SELECT * FROM about_info WHERE about_id = 1";
$select_about = mysqli_query($connection, $select_about_query);
$about_info = mysqli_fetch_assoc($select_about);
?>

<section class="about-section section-gap-full relative" id="about-section">
  <div class="container">
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-6 col-md-12 about-left">
        <img class="img-fluid" src="front_assets/img/<?= $about_info['about_image'] ?>" alt="">
      </div>
      <div class="col-lg-5 col-md-12 about-right">
        <h3>About Me</h3>
        <h1><?= $about_info['about_title'] ?></h1>
        <p>
          <?= $about_info['about_content'] ?>
        </p>
        <a class="primary-btn" href="<?= $about_info['action_link'] ?>"><?= $about_info['action_text'] ?></a>
      </div>
    </div>
  </div>
  <div class="floating-shapes">
    <span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'>
      <img src="img/shape/fl-shape-1.png" alt="">
    </span>
    <span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'>
      <img src="img/shape/fl-shape-2.png" alt="">
    </span>
    <span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'>
      <img src="img/shape/fl-shape-3.png" alt="">
    </span>
    <span data-parallax='{"x": -20, "y": 180}'>
      <img src="img/shape/fl-shape-4.png" alt="">
    </span>
    <span data-parallax='{"x": 300, "y": 70}'>
      <img src="img/shape/fl-shape-5.png" alt="">
    </span>
    <span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'>
      <img src="img/shape/fl-shape-6.png" alt="">
    </span>
    <span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'>
      <img src="img/shape/fl-shape-7.png" alt="">
    </span>
    <span data-parallax='{"x": 60, "y": -100}'>
      <img src="img/shape/fl-shape-9.png" alt="">
    </span>
    <span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'>
      <img src="img/shape/fl-shape-10.png" alt="">
    </span>
  </div>
</section>