<?php
ob_start(); 
$title = "Admin - Edit Service"; 
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
    $page_title = "Edit Service";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        $service_id = $_GET['service_id'];
        $get_service_query = "SELECT * FROM services WHERE service_id = '$service_id'";
        $get_service = mysqli_query($connection, $get_service_query);
        if (!$get_service) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } 
        else {
          $service = mysqli_fetch_assoc($get_service);
        }

        if (isset($_POST['update_service'])) {
          $service_icon = $_POST['service_icon'];
          $service_title = $_POST['service_title'];
          $service_content = $_POST['service_content'];

          $update_service_query = "UPDATE services SET service_icon = '$service_icon', service_title = '$service_title', service_content = '$service_content' WHERE service_id = $service_id";

          $update_service = mysqli_query($connection, $update_service_query);
          if (!$update_service) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['service_updated'] = "Service is successfully updated!";
            header('location: services.php');
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Edit Service</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="service_icon"></label>
                    <input type="text" id="service_icon" name="service_icon" 
                    value="<?= $service['service_icon']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="service_title"></label>
                    <input type="text" id="service_title" name="service_title" 
                    value="<?= $service['service_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="service_content"></label>
                    <textarea cols="43" rows="6" style="padding: 10px;" id="service_content" name="service_content" placeholder="Enter service details"> <?= $service['service_content']; ?> </textarea>
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update Service" name="update_service">
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