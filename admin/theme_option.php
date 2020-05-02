<?php $title = "Admin - Theme" ?>
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
    $page_title = "Theme options";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">
      <div class="container mt-5">

        <?php
        $select_theme_options_query = "SELECT * FROM theme_options";
        $select_theme_options = mysqli_query($connection, $select_theme_options_query);
        $theme_options = mysqli_fetch_assoc($select_theme_options);
        ?>

        <!--update message-->
        <?php if (isset($_SESSION['theme_updated'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['theme_updated'];
            unset($_SESSION['theme_updated']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
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

        <div class="row">

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">

                <form action="theme_option_update.php" method="post">

                  <div class="form-group">
                    <label for="owner_name">Owner Name</label>
                    <input class="form-control" type="text" name="owner_name" value="<?= $theme_options['owner_name'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="owner_title">Owner Title</label>
                    <input class="form-control" type="text" name="owner_title" value="<?= $theme_options['owner_title'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="action_text">Action Button text</label>
                    <input class="form-control" type="text" name="action_text" value="<?= $theme_options['action_text'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="action_link">Action Button Link</label>
                    <input class="form-control" type="text" name="action_link" value="<?= $theme_options['action_link'] ?>">
                  </div>

                  <input type="submit" value="Update Theme" class="btn btn-outline-primary" name="update_theme_texts">
                </form>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <form action="theme_option_update.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="owner_image">Website Logo</label>
                    <img class="mb-2 d-block" width="160" src="../front_assets/img/<?= $theme_options['logo'] ?>" alt="">
                    <input class="form-control" type="file" name="logo">
                  </div>

                  <input type="submit" value="Update Logo" class="btn btn-outline-primary" name="update_theme_logo">
                </form>

                <form class="mt-5" action="theme_option_update.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="owner_image">Owner Image</label>
                    <img class="mb-2 d-block" width="160" src="../front_assets/img/<?= $theme_options['owner_image'] ?>" alt="">
                    <input class="form-control" type="file" name="owner_image">

                    <input type="submit" value="Update Banner" class="btn btn-outline-primary mt-3" name="update_theme_owner_image">
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- main content area end -->

  <!-- admin footer file -->
  <?php require_once "includes/admin_footer.php" ?>