<?php 
ob_start();
$title = "Admin - Edit Education" 
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
    $page_title = "Edit Education";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        $education_id = $_GET['education_id'];
        $get_education_query = "SELECT * FROM educations WHERE education_id = '$education_id'";
        $get_education = mysqli_query($connection, $get_education_query);
        if (!$get_education) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } 
        else {
          $education = mysqli_fetch_assoc($get_education);
        }

        if (isset($_POST['update_education'])) {
          $education_icon = $_POST['education_icon'];
          $education_title = $_POST['education_title'];
          $education_length = $_POST['education_length'];
          $education_content = $_POST['education_content'];

          $update_education_query = "UPDATE educations SET education_icon = '$education_icon', education_title = '$education_title', education_length = '$education_length', education_content = '$education_content' WHERE education_id = $education_id";

          $update_education = mysqli_query($connection, $update_education_query);
          if (!$update_education) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['education_updated'] = "education is successfully updated!";
            header('location: educations.php');
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Edit education</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="education_icon"></label>
                    <input type="text" id="education_icon" name="education_icon" value="<?= $education['education_icon']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="education_title"></label>
                    <input type="text" id="education_title" name="education_title" value="<?= $education['education_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="education_length"></label>
                    <input type="text" id="education_length" name="education_length" value="<?= $education['education_length']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="education_content"></label>
                    <input type="text" id="education_content" name="education_content" value="<?= $education['education_content']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add education" name="update_education">
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