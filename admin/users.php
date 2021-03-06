<?php $title = "Admin - Users"; ?>
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
      $page_title = "Users";
      require_once "includes/admin_page_title.php"; 
    ?>
    <!-- page title area end -->

    <?php

    $read_users_query = "SELECT * FROM users";
    $read_users = mysqli_query($connection, $read_users_query);
    if (!$read_users) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <!--User Deleted-->
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
            <h4 class="header-title">Users Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_users as $user) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><?= $user['user_name']; ?></td>
                      <td><?= $user['user_email']; ?></td>
                      <td> <img width="30" height="30" src="assets/images/author/<?= $user['user_avatar']; ?>" alt=""> </td>
                      <td>
                        <?php if ($user['user_status'] != 1) { ?>
                          <span class="badge badge-warning">Deactivated</span>
                        <?php } else { ?>
                          <span class="badge badge-success">Active</span>
                        <?php } ?>
                      </td>
                      <td>
                        <div class="btn-group" role="group">
                          <?php if ($user['user_status'] != 1) { ?>
                            <!--active button-->
                            <a href="user_activate.php?<?php echo "user_id=" . $user['user_id'] ?>" class="btn btn-success text-white"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
                          <?php } else { ?>
                            <!--deactive button-->
                            <a href="user_deactivate.php?<?php echo "user_id=" . $user['user_id'] ?>" class="btn btn-warning text-white"><i class="fa fa-ban" aria-hidden="true"></i></a>
                          <?php } ?>
                          <!--delete button-->
                          <a href="user_delete.php?<?php echo "user_id=" . $user['user_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
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