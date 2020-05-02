<?php $title = "Admin - educations"; ?>
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
    $page_title = "educations";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php

    $read_educations_query = "SELECT * FROM educations ORDER BY education_id desc";
    $read_educations = mysqli_query($connection, $read_educations_query);
    if (!$read_educations) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <?php if (isset($_SESSION['education_updated'])) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['education_updated'];
                unset($_SESSION['education_updated']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <!--education Deleted-->
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
            <h4 class="header-title">educations Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>education Icon</th>
                    <th>education Title</th>
                    <th>education Length</th>
                    <th>education Content</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_educations as $education) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><i style="font-size: 35px;" class="<?= $education['education_icon']; ?>"></i></td>
                      <td><?= $education['education_title']; ?></td>
                      <td><?= $education['education_length']; ?></td>
                      <td><?= $education['education_content']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="education_edit.php?<?php echo "education_id=" . $education['education_id'] ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                          <a href="education_delete.php?<?php echo "education_id=" . $education['education_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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