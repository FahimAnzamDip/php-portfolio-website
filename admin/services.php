<?php $title = "Admin - Services"; ?>
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
    $page_title = "Services";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php

    $read_services_query = "SELECT * FROM services ORDER BY service_id desc";
    $read_services = mysqli_query($connection, $read_services_query);
    if (!$read_services) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">

            <?php if (isset($_SESSION['service_updated'])) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['service_updated'];
                unset($_SESSION['service_updated']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <!--Service Deleted-->
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
            <h4 class="header-title">Services Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>Service Icon</th>
                    <th>Service Title</th>
                    <th>Service Content</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_services as $service) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><i style="font-size: 35px;" class="<?= $service['service_icon']; ?>"></i></td>
                      <td><?= $service['service_title']; ?></td>
                      <td><?= $service['service_content']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="service_edit.php?<?php echo "service_id=" . $service['service_id'] ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                          <a href="service_delete.php?<?php echo "service_id=" . $service['service_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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