<?php $title = "Admin - Feedbacks"; ?>
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
    $page_title = "Feedbacks";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php

    $read_feedbacks_query = "SELECT * FROM feedbacks ORDER BY feedback_id desc";
    $read_feedbacks = mysqli_query($connection, $read_feedbacks_query);
    if (!$read_feedbacks) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">

            <?php if (isset($_SESSION['feedback_updated'])) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['feedback_updated'];
                unset($_SESSION['feedback_updated']);
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
            <h4 class="header-title">feedback Item Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>Feedback Title</th>
                    <th>Feedback Sub title</th>
                    <th>Feedback Image</th>
                    <th>Feedback Content</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_feedbacks as $feedback) : ?>
                    <tr>
                      <td><?= $serial++; ?></td>
                      <td><?= $feedback['feedback_title']; ?></td>
                      <td><?= $feedback['feedback_sub_title']; ?></td>
                      <td><img width="40" height="40" src="assets/images/feedback_img/<?= $feedback['feedback_image']; ?>" alt=""></td>
                      <td><?= $feedback['feedback_content']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="feedback_edit.php?<?php echo "feedback_id=" . $feedback['feedback_id']; ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                          <a href="feedback_delete.php?<?php echo "feedback_id=" . $feedback['feedback_id']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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