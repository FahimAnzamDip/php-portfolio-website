<?php 
ob_start();
$title = "Admin - Edit stat" 
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
    $page_title = "Edit stat";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        $stat_id = $_GET['stat_id'];
        $get_stat_query = "SELECT * FROM stats WHERE stat_id = '$stat_id'";
        $get_stat = mysqli_query($connection, $get_stat_query);
        if (!$get_stat) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } 
        else {
          $stat = mysqli_fetch_assoc($get_stat);
        }

        if (isset($_POST['update_stat'])) {
          $stat_icon = $_POST['stat_icon'];
          $stat_number = $_POST['stat_number'];
          $stat_title = $_POST['stat_title'];

          $update_stat_query = "UPDATE stats SET stat_icon = '$stat_icon', stat_number = $stat_number, stat_title = '$stat_title' WHERE stat_id = $stat_id";

          $update_stat = mysqli_query($connection, $update_stat_query);
          if (!$update_stat) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['stat_updated'] = "stat is successfully updated!";
            header('location: stats.php');
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Edit stat</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="stat_icon"></label>
                    <input type="text" id="stat_icon" name="stat_icon" 
                    value="<?= $stat['stat_icon']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="stat_number"></label>
                    <input type="number" id="stat_number" name="stat_number" 
                    value="<?= $stat['stat_number']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="stat_title"></label>
                    <input type="text" id="stat_title" name="stat_title" 
                    value="<?= $stat['stat_title']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update stat" name="update_stat">
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