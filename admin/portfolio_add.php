<?php $title = "Admin - Add Portfolio" ?>
<!-- admin header file -->
<?php require_once "includes/admin_header.php"; ?>

<!-- check for user login -->
<?php require_once "includes/auth_check.php"; ?>

<!-- page container area start -->
<div class="page-container">

  <!-- admin navigation file -->
  <?php require_once "includes/admin_navigation.php"; ?>

  <!-- main content area start -->
  <div class="main-content">
    <!-- admin search bar file -->
    <?php require_once "includes/admin_search.php"; ?>

    <!-- page title area start -->
    <?php
    $page_title = "Add Portfolio";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
      if (isset($_POST['add_portfolio'])) {

        $portfolio_image = $_FILES['portfolio_img'];
        $portfolio_title = $_POST['portfolio_title'];
        $portfolio_category = $_POST['portfolio_category'];
        $portfolio_link = $_POST['portfolio_link'];

        $img_extension = explode('.', $portfolio_image['name']);
        $img_extension = end($img_extension);

        $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

        if (in_array($img_extension, $valid_extensions)) {
          if ($portfolio_image['size'] < 1000000) {

            $insert_portfolio_query = "INSERT INTO portfolios (portfolio_title, portfolio_category, portfolio_link) VALUES ('$portfolio_title', '$portfolio_category', '$portfolio_link')";
            $insert_portfolio = mysqli_query($connection, $insert_portfolio_query);

            $portfolio_id = mysqli_insert_id($connection);

            $new_img_name = $portfolio_id . '.' . $img_extension;

            $img_set_location = "assets/images/portfolio_img/" . $new_img_name;
            move_uploaded_file($portfolio_image['tmp_name'], $img_set_location);

            $portfolio_img_query = "UPDATE portfolios SET portfolio_image = '$new_img_name' WHERE portfolio_id = $portfolio_id";
            $portfolio_img = mysqli_query($connection, $portfolio_img_query);

            if (!$portfolio_img) {
              die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
            }
            else {
              $_SESSION['portfolio_added'] = "Portfolio Added! Add another one?";
            } 

          } 
          else {
            $_SESSION['size_err'] = "Image is too large! Need less than 1MB.";
          }
        } 
        else {
          $_SESSION['ext_err'] = "Image format must be jpg or png!";
        }
      }
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['portfolio_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['portfolio_added'];
                  unset($_SESSION['portfolio_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php if (isset($_SESSION['ext_err'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['ext_err'];
                  unset($_SESSION['ext_err']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php if (isset($_SESSION['size_err'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['size_err'];
                  unset($_SESSION['size_err']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div class="login-form-head">
                  <h4 id="chp">Add Portfolio Item</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="service_icon"></label>
                    <input type="file" name="portfolio_img">
                  </div>

                  <div class="form-gp">
                    <label for="portfolio_title">Portfolio Title</label>
                    <input type="text" name="portfolio_title">
                  </div>

                  <div class="form-gp">
                    <label for="portfolio_category">Portfolio Category</label>
                    <input type="text" name="portfolio_category">
                  </div>

                  <div class="form-gp">
                    <label for="portfolio_link">Portfolio Link</label>
                    <input type="text" name="portfolio_link">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add Portfolio" name="add_portfolio">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- main content area end -->

  <!-- admin footer file -->
  <?php require_once "includes/admin_footer.php" ?>