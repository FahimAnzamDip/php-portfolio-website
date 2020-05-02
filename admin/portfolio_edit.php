<?php
ob_start(); 
$title = "Admin - Edit Portfolio" 
?>
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
    $page_title = "Edit Portfolio";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
      $portfolio_id = $_GET['portfolio_id'];

      $get_portfolio_query = "SELECT * FROM portfolios WHERE portfolio_id = '$portfolio_id'";
      $get_portfolio = mysqli_query($connection, $get_portfolio_query);
      if (!$get_portfolio) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      } else {
        $portfolio = mysqli_fetch_assoc($get_portfolio);
      }

      if (isset($_POST['update_portfolio'])) {
        if (!empty($_FILES['portfolio_image']['name'])) {
          //delete the image first
          $select_image = "SELECT portfolio_image FROM portfolios WHERE portfolio_id = $portfolio_id";
          $image = mysqli_query($connection, $select_image);
          $port_img = mysqli_fetch_assoc($image);
          $image_location = "assets/images/portfolio_img/" . $port_img['portfolio_image'];
          unlink($image_location);

          $portfolio_image = $_FILES['portfolio_image'];
          $portfolio_title = $_POST['portfolio_title'];
          $portfolio_category = $_POST['portfolio_category'];
          $portfolio_link = $_POST['portfolio_link'];

          $img_extension = explode('.', $portfolio_image['name']);
          $img_extension = end($img_extension);

          $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

          if (in_array($img_extension, $valid_extensions)) {
            if ($portfolio_image['size'] < 1000000) {

              $update_portfolio_query = "UPDATE portfolios SET portfolio_title = '$portfolio_title', portfolio_category = '$portfolio_category', portfolio_link = '$portfolio_link' WHERE portfolio_id = $portfolio_id";
              $update_portfolio = mysqli_query($connection, $update_portfolio_query);

              $new_img_name = $portfolio_id . '.' . $img_extension;

              $img_set_location = "assets/images/portfolio_img/" . $new_img_name;
              move_uploaded_file($portfolio_image['tmp_name'], $img_set_location);

              $portfolio_img_query = "UPDATE portfolios SET portfolio_image = '$new_img_name' WHERE portfolio_id = $portfolio_id";
              $portfolio_img = mysqli_query($connection, $portfolio_img_query);

              if (!$portfolio_img) {
                die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
              } else {
                $_SESSION['portfolio_updated'] = "portfolio is successfully updated!";
                header('location: portfolios.php');
              }
            } else {
              $_SESSION['size_err'] = "Image is too large! Need less than 1MB.";
            }
          } else {
            $_SESSION['ext_err'] = "Image format must be jpg or png!";
          }
        } else {
          $portfolio_title = $_POST['portfolio_title'];
          $portfolio_category = $_POST['portfolio_category'];
          $portfolio_link = $_POST['portfolio_link'];

          $update_portfolio_query = "UPDATE portfolios SET portfolio_title = '$portfolio_title', portfolio_category = '$portfolio_category', portfolio_link = '$portfolio_link' WHERE portfolio_id = $portfolio_id";

          $update_portfolio = mysqli_query($connection, $update_portfolio_query);
          if (!$update_portfolio) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['portfolio_updated'] = "portfolio is successfully updated!";
            header('location: portfolios.php');
          }
        }
      }
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div class="login-form-head">
                  <h4 id="chp">Edit portfolio</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="portfolio_image"></label>
                    <input type="file" id="portfolio_image" name="portfolio_image" value="<?= $portfolio['portfolio_image']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="portfolio_title"></label>
                    <input type="text" id="portfolio_title" name="portfolio_title" value="<?= $portfolio['portfolio_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="portfolio_category"></label>
                    <input type="text" id="portfolio_category" name="portfolio_category" value="<?= $portfolio['portfolio_category']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="portfolio_link"></label>
                    <input type="text" id="portfolio_link" name="portfolio_link" value="<?= $portfolio['portfolio_link']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update portfolio" name="update_portfolio">
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