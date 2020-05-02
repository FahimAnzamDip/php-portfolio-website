<?php $title = "Admin - Add Education"; ?>
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
    $page_title = "Add Education";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        if (isset($_POST['add_education'])) {
          $education_icon = $_POST['education_icon'];
          $education_title = $_POST['education_title'];
          $education_length = $_POST['education_length'];
          $education_content = $_POST['education_content'];

          $add_education_query = "INSERT INTO educations (education_icon, education_title, education_length, education_content) VALUES('$education_icon', '$education_title', '$education_length', '$education_content')";

          $add_education = mysqli_query($connection, $add_education_query);
          if (!$add_education) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['education_added'] = "education is successfully added! Add another one?";
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['education_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['education_added'];
                  unset($_SESSION['education_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Add education</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="education_icon">education Icon</label>
                    <input type="text" id="education_icon" name="education_icon">
                  </div>

                  <div class="form-gp">
                    <label for="education_title">education title</label>
                    <input type="text" id="education_title" name="education_title">
                  </div>

                  <div class="form-gp">
                    <label for="education_length">education length</label>
                    <input type="text" id="education_length" name="education_length">
                  </div>

                  <div class="form-gp">
                    <label for="education_content">education content</label>
                    <input type="text" id="education_content" name="education_content">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add education" name="add_education">
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