<?php $title = "Admin - Stats"; ?>
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
    $page_title = "Stats";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php

    $read_stats_query = "SELECT * FROM stats ORDER BY stat_id desc";
    $read_stats = mysqli_query($connection, $read_stats_query);
    if (!$read_stats) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <!--stat updated-->
            <?php if (isset($_SESSION['stat_updated'])) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['stat_updated'];
                unset($_SESSION['stat_updated']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <!--stat Deleted-->
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
            <h4 class="header-title">Stats Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>Stat Icon</th>
                    <th>Stat Number</th>
                    <th>Stat Title</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_stats as $stat) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><i style="font-size: 35px;" class="<?= $stat['stat_icon']; ?>"></i></td>
                      <td><?= $stat['stat_number']; ?></td>
                      <td><?= $stat['stat_title']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="stat_edit.php?<?php echo "stat_id=" . $stat['stat_id'] ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                          <a href="stat_delete.php?<?php echo "stat_id=" . $stat['stat_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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