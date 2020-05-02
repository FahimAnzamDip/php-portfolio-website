<?php $title = "Admin - About Me" ?>
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
    $page_title = "About Me";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">
      <div class="container mt-5">

      <?php 
        $select_about_query = "SELECT * FROM about_info WHERE about_id = 1";
        $select_about = mysqli_query($connection, $select_about_query);
        $about_info = mysqli_fetch_assoc($select_about);
      ?>

        <!--update message-->
        <?php if (isset($_SESSION['about_updated'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['about_updated'];
            unset($_SESSION['about_updated']);
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

                <form action="about_update.php" method="post">

                  <div class="form-group">
                    <label for="about_title">About Title</label>
                    <input class="form-control" type="text" name="about_title" value="<?= $about_info['about_title'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="about_content">Abount Content</label>
                    <textarea class="form-control" name="about_content" cols="58" rows="6"><?= $about_info['about_content'] ?></textarea>
                    
                  </div>

                  <div class="form-group">
                    <label for="action_text">About Button text</label>
                    <input class="form-control" type="text" name="action_text" value="<?= $about_info['action_text'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="action_link">About Button Link</label>
                    <input class="form-control" type="text" name="action_link" value="<?= $about_info['action_link'] ?>">
                  </div>

                  <input type="submit" value="Update About" class="btn btn-outline-primary" name="update_about_texts">
                </form>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <form action="about_update.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="owner_image">About Section Image</label>
                    <img class="mb-2 d-block" width="160" src="../front_assets/img/<?= $about_info['about_image'] ?>" alt="">
                    <input class="form-control" type="file" name="about_image">
                  </div>

                  <input type="submit" value="Update About Image" class="btn btn-outline-primary" name="update_about_image">
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