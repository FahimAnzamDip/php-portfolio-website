<?php $title = "Admin - Add Menu" ?>
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
    $page_title = "Add Menu";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        if (isset($_POST['add_menu'])) {
          $menu_title = $_POST['menu_title'];
          $menu_link = $_POST['menu_link'];

          $add_menu_query = "INSERT INTO menus (menu_title, menu_link) VALUES ('$menu_title', '$menu_link')";

          $add_menu = mysqli_query($connection, $add_menu_query);
          if (!$add_menu) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['menu_added'] = "menu is successfully added! Add another one?";
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['menu_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['menu_added'];
                  unset($_SESSION['menu_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Add menu</h4>
                </div>
                <div class="login-form-body">

                  <div class="form-gp">
                    <label for="menu_title">Menu Title</label>
                    <input type="text" id="menu_title" name="menu_title">
                  </div>

                  <div class="form-gp">
                    <label for="menu_link">Menu Link</label>
                    <input type="text" id="menu_link" name="menu_link">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add menu" name="add_menu">
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