<?php $title = "Admin - Dashboard" ?>
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
    $page_title = "Profile";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">
      <div class="row mt-5">
        <div class="col-md-7">

          <?php
          $user_id = $_SESSION['user_id'];

          $current_user_query = "SELECT * FROM users WHERE user_id = $user_id";
          $current_user = mysqli_query($connection, $current_user_query);

          $user = mysqli_fetch_assoc($current_user);
          ?>

          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <div class="table-header">
                  <h4 class="header-title">Profile Information</h4>
                </div>
                <tbody>
                  <tr>
                    <th class="text-bold text-capitalize">user id:</th>
                    <td><?= $user['user_id']; ?></td>
                  </tr>

                  <tr>
                    <th class="text-bold text-capitalize">user name:</th>
                    <td><?= $user['user_name']; ?></td>
                  </tr>

                  <tr>
                    <th class="text-bold text-capitalize">user email:</th>
                    <td><?= $user['user_email']; ?></td>
                  </tr>

                  <tr>
                    <th class="text-bold text-capitalize">user status:</th>
                    <td>
                      <?php if ($user['user_status'] != 1) { ?>
                        <span class="badge badge-warning">Deactivated</span>
                      <?php } else { ?>
                        <span class="badge badge-success">Active</span>
                      <?php } ?>
                    </td>
                  </tr>
                </tbody>
              </table>
              <a href="change_password.php" class="btn btn-outline-info">
                Change Password
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <!-- Extension error -->
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
              <!-- Size error -->
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
              <!-- Image changed -->
              <?php if (isset($_SESSION['img_changed'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['img_changed'];
                  unset($_SESSION['img_changed']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <img width="180" src="assets/images/author/<?= $user['user_avatar']; ?>" alt="">
              <form action="user_image.php" method="post" enctype="multipart/form-data">
                <input type="file" class="mt-3" name="user_img_file">
                <input type="submit" class="btn btn-outline-info btn-block mt-3" value="Change Avatar" name="change_user_img">
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