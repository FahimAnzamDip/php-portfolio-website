<?php
// require_once "admin/includes/db.php";

  $show_skills_query = "SELECT * FROM skills";
  $show_skills = mysqli_query($connection, $show_skills_query);
  if (!$show_skills) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  }
?>

<section class="skill-section section-gap-half">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-6 skill-left">
        <h2>I am skilled</h2>
        <p>
          I am skilled in web based technologies. Such as Html, css, javascript, php. I am learning new things on daily basis because I am a entry level developer. Currently I have some skills and those are mentioned below with the expertise level that I think I have right now.
        </p>

        <?php foreach ($show_skills as $skill): ?>
        <div class="prog_container">
          <div class="prog_text">
            <span class="title text-uppercase">
              <?= $skill['skill_title']; ?>
            </span>
            <span class="precent" style="left:<?= $skill['skill_level'] .  "%;"; ?>"><?= $skill['skill_level']; ?>%</span>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?= $skill['skill_level'] . "%;"; ?>" aria-valuenow="<?= $skill['skill_level']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
      <div class="col-lg-6 skill-right">
        <img class="img-fluid" src="front_assets/img/hero_back.png" alt="">
      </div>
    </div>
  </div>
</section>