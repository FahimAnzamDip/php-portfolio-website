<?php 
ob_start();
$title = "Admin - Edit skill"; 
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
    $page_title = "Edit skill";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        $skill_id = $_GET['skill_id'];
        $get_skill_query = "SELECT * FROM skills WHERE skill_id = '$skill_id'";
        $get_skill = mysqli_query($connection, $get_skill_query);
        if (!$get_skill) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } 
        else {
          $skill = mysqli_fetch_assoc($get_skill);
        }

        if (isset($_POST['update_skill'])) {
          $skill_title = $_POST['skill_title'];
          $skill_level = $_POST['skill_level'];

          $update_skill_query = "UPDATE skills SET skill_title = '$skill_title', skill_level = '$skill_level' WHERE skill_id = $skill_id";

          $update_skill = mysqli_query($connection, $update_skill_query);
          if (!$update_skill) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['skill_updated'] = "skill is successfully updated!";
            header('location: skills.php');
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Edit skill</h4>
                </div>
                <div class="login-form-body">

                  <div class="form-gp">
                    <label for="skill_title"></label>
                    <input type="text" id="skill_title" name="skill_title" 
                    value="<?= $skill['skill_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="skill_level"></label>
                    <input type="number" id="skill_level" name="skill_level" 
                    value="<?= $skill['skill_level']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update skill" name="update_skill">
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