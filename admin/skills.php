<?php $title = "Admin - Skills"; ?>
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
    $page_title = "Skills";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php

    $read_skills_query = "SELECT * FROM skills ORDER BY skill_id desc";
    $read_skills = mysqli_query($connection, $read_skills_query);
    if (!$read_skills) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">

            <?php if (isset($_SESSION['skill_updated'])) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['skill_updated'];
                unset($_SESSION['skill_updated']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <!--skill Deleted-->
            <?php if (isset($_SESSION['delete_msg'])) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['delete_msg'];
                unset($_SESSION['delete_msg']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <h4 class="header-title">skills Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>Skill Title</th>
                    <th>Skill Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_skills as $skill) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><?= $skill['skill_title']; ?></td>
                      <td><?= $skill['skill_level']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="skill_edit.php?<?php echo "skill_id=" . $skill['skill_id'] ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                          <a href="skill_delete.php?<?php echo "skill_id=" . $skill['skill_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Primary table end -->
    </div>
  </div>
  <!-- main content area end -->

  <!-- admin footer file -->
  <?php require_once "includes/admin_footer.php" ?>