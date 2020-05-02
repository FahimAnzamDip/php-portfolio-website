<?php $title = "Admin - Add Stat"; ?>
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
    $page_title = "Add Stat";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        if (isset($_POST['add_stat'])) {
          $stat_icon = $_POST['stat_icon'];
          $stat_number = $_POST['stat_number'];
          $stat_title = $_POST['stat_title'];

          $add_stat_query = "INSERT INTO stats (stat_icon, stat_number, stat_title) VALUES('$stat_icon', $stat_number, '$stat_title')";

          $add_stat = mysqli_query($connection, $add_stat_query);
          if (!$add_stat) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['stat_added'] = "stat is successfully added! Add another one?";
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['stat_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['stat_added'];
                  unset($_SESSION['stat_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Add stat</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="stat_icon">stat Icon</label>
                    <input type="text" id="stat_icon" name="stat_icon">
                  </div>

                  <div class="form-gp">
                    <label for="stat_number">stat number</label>
                    <input type="number" id="stat_number" name="stat_number">
                  </div>

                  <div class="form-gp">
                    <label for="stat_title">stat Title</label>
                    <input type="text" id="stat_title" name="stat_title">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add stat" name="add_stat">
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