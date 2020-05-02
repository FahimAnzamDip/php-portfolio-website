<?php $title = "Admin - Messages"; ?>
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
      $page_title = "Messages";
      require_once "includes/admin_page_title.php"; 
    ?>
    <!-- page title area end -->

    <?php

    $read_messages_query = "SELECT * FROM messages ORDER BY message_id DESC";
    $read_messages = mysqli_query($connection, $read_messages_query);
    if (!$read_messages) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <!--Message Deleted-->
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
            <h4 class="header-title">Messages</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>Guest Name</th>
                    <th>Guest Email</th>
                    <th>Message Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_messages as $message) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><?= $message['guest_name']; ?></td>
                      <td><?= $message['guest_email']; ?></td>
                      <td><?= date('h:i a, d/m/Y', strtotime($message['message_date'])); ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="message_details.php?<?php echo "message_id=" . $message['message_id'] ?>" class="btn btn-info">See Details</a>
                          <!--delete button-->
                          <a href="message_delete.php?<?php echo "message_id=" . $message['message_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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