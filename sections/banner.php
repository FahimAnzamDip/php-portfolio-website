<?php
  $theme_options_query = "SELECT * FROM theme_options";
  $theme_options = mysqli_query($connection, $theme_options_query);

  $get_theme_options = mysqli_fetch_assoc($theme_options);
?>

<section style="
    background: url(front_assets/img/<?php echo $get_theme_options["owner_image"];?>);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;" class="banner-section3 relative" id="banner-section">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row align-items-center fullscreen">
      <div class="col-lg-6 col-md-7 banner-left">
        <h1 class="text-uppercase">Hello, I'm <br> <span> <?php echo $get_theme_options["owner_name"]; ?> </span></h1>
        <p><?php echo $get_theme_options["owner_title"]; ?></p>
        <a class="video-btn primary-btn" href="<?php echo $get_theme_options["action_link"]; ?>">
          <?php echo $get_theme_options["action_text"]; ?>
        </a>
      </div>
    </div>
  </div>
</section>