<?php
ob_start();
$title = "Admin - Edit menu"
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
    $page_title = "Edit menu";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
      $menu_id = $_GET['menu_id'];
      $get_menu_query = "SELECT * FROM menus WHERE menu_id = '$menu_id'";
      $get_menu = mysqli_query($connection, $get_menu_query);
      if (!$get_menu) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      } else {
        $menu = mysqli_fetch_assoc($get_menu);
      }

      if (isset($_POST['update_menu'])) {
        $menu_title = $_POST['menu_title'];
        $menu_link = $_POST['menu_link'];

        $update_menu_query = "UPDATE menus SET menu_title = '$menu_title', menu_link = '$menu_link' WHERE menu_id = $menu_id";

        $update_menu = mysqli_query($connection, $update_menu_query);
        if (!$update_menu) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } else {
          $_SESSION['menu_updated'] = "menu is successfully updated!";
          header('location: menus.php');
        }
      }
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Edit menu</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="menu_title"></label>
                    <input type="text" id="menu_title" name="menu_title" value="<?= $menu['menu_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="menu_link"></label>
                    <input type="text" id="menu_link" name="menu_link" value="<?= $menu['menu_link']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update menu" name="update_menu">
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