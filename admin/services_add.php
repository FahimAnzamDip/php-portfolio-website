<?php $title = "Admin - Add Service" ?>
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
    $page_title = "Add Service";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        if (isset($_POST['add_service'])) {
          $service_icon = $_POST['service_icon'];
          $service_title = $_POST['service_title'];
          $service_content = $_POST['service_content'];

          $add_service_query = "INSERT INTO services (service_icon, service_title, service_content) VALUES ('$service_icon', '$service_title', '$service_content')";

          $add_service = mysqli_query($connection, $add_service_query);
          if (!$add_service) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['service_added'] = "Service is successfully added! Add another one?";
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['service_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['service_added'];
                  unset($_SESSION['service_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Add Service</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="service_icon">Service Icon</label>
                    <input type="text" id="service_icon" name="service_icon">
                  </div>

                  <div class="form-gp">
                    <label for="service_title">Service Title</label>
                    <input type="text" id="service_title" name="service_title">
                  </div>

                  <div class="form-gp">
                    <label for="service_content"></label>
                    <textarea style="padding: 10px;" cols="43" rows="6" id="service_content" name="service_content" placeholder="Enter service details"></textarea>
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add Service" name="add_service">
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