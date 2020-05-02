<?php
$theme_options_query = "SELECT * FROM theme_options";
$theme_options = mysqli_query($connection, $theme_options_query);

$get_theme_options = mysqli_fetch_assoc($theme_options);
?>

<footer class="footer-section section-gap-half">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 footer-left">
        <a href="#">
          <img width="160" src="front_assets/img/<?= $get_theme_options['logo']; ?>" alt="">
        </a>
        <p class="copyright-text">&copy; 2020 Design With
          <i class="fa fa-heart" aria-hidden="true"></i> By
          <a href="#" target="_blank">Fahim</a>
        </p>
      </div>
      <div class="col-lg-7">
        <ul id="social">
          <li>
            <a target="_blank" href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li>
            <a target="_blank" href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li>
            <a target="_blank" href="#">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
          <li>
            <a target="_blank" href="#">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
        <ul class="footer-menu">
          <li>
            <a href="#banner-section">Home</a>
          </li>
          <li>
            <a href="#about-section">About</a>
          </li>
          <li>
            <a href="#feature-section">Portfolio</a>
          </li>
          <li>
            <a href="#testimonial-section">Testimonial</a>
          </li>
          <li>
            <a href="#contact-section">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- End footer section -->

<div class="scroll-top">
  <i class="ti-angle-up"></i>
</div>

<!--
JS
============================================= -->
<script src="front_assets/js/vendor/jquery.min.js"></script>
<script src="front_assets/js/vendor/popper.min.js"></script>
<script src="front_assets/js/jquery.easing.1.3.js"></script>
<script src="front_assets/js/vendor/bootstrap.min.js"></script>
<script src="front_assets/js/jquery.parallax-scroll.js"></script>
<script src="front_assets/js/dopeNav.js"></script>
<script src="front_assets/js/owl.carousel.min.js"></script>
<script src="front_assets/js/waypoints.min.js"></script>
<script src="front_assets/js/jquery.stellar.min.js"></script>
<script src="front_assets/js/jquery.counterup.min.js"></script>
<script src="front_assets/js/main.js"></script>
</body>

</html>