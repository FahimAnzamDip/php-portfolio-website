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
    $page_title = "Change Passoword";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">

              <form action="update_password.php" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Change Password</h4>
                </div>
                <div class="login-form-body">
                  <?php if (isset($_SESSION['err1'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php
                      echo $_SESSION['err1'];
                      unset($_SESSION['err1']);
                      ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['err2'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php
                      echo $_SESSION['err2'];
                      unset($_SESSION['err2']);
                      ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['err3'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php
                      echo $_SESSION['err3'];
                      unset($_SESSION['err3']);
                      ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['err4'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php
                      echo $_SESSION['err4'];
                      unset($_SESSION['err4']);
                      ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['err5'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php
                      echo $_SESSION['err5'];
                      unset($_SESSION['err5']);
                      ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>

                  <div class="form-gp">
                    <label for="user_old_password"></label>
                    <input type="password" id="user_email" name="user_old_password" placeholder="Enter your old password">
                    <i class="ti-lock"></i>
                  </div>

                  <div class="form-gp">
                    <label for="user_password"></label>
                    <input type="password" id="user_password" name="user_password" placeholder="Enter your new password">
                    <i class="ti-lock"></i>
                  </div>

                  <div class="form-gp">
                    <label for="user_confirm_password"></label>
                    <input type="password" id="user_confirm_password" name="user_confirm_password" placeholder="Enter your new password again">
                    <i class="ti-lock"></i>
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update Password" name="update">
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