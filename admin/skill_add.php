<?php $title = "Admin - Add skill"; ?>
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
    $page_title = "Add skill";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
      if (isset($_POST['add_skill'])) {
        $skill_title = $_POST['skill_title'];
        $skill_level = $_POST['skill_level'];

        $add_skill_query = "INSERT INTO skills (skill_title, skill_level) VALUES('$skill_title', $skill_level)";

        $add_skill = mysqli_query($connection, $add_skill_query);
        if (!$add_skill) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } else {
          $_SESSION['skill_added'] = "skill is successfully added! Add another one?";
        }
      }
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['skill_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['skill_added'];
                  unset($_SESSION['skill_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Add skill</h4>
                </div>
                <div class="login-form-body">

                  <div class="form-gp">
                    <label for="skill_title">Skill Title</label>
                    <input type="text" id="skill_title" name="skill_title">
                  </div>

                  <div class="form-gp">
                    <label for="skill_level">Skill Level</label>
                    <input type="number" id="skill_level" name="skill_level">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add skill" name="add_skill">
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