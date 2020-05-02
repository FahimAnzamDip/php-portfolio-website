<?php $title = "Admin - Message Details"; ?>
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
    $page_title = "Message Details";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php
      $message_id = $_GET['message_id'];
      $read_message_query = "SELECT * FROM messages WHERE message_id = $message_id";
      $read_message = mysqli_query($connection, $read_message_query);

      if (!$read_message) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      }
      
      $message_details = mysqli_fetch_assoc($read_message);
    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-header text-center bg-primary text-bold text-white">
            Message Came At - <?= date('h:i a, d/m/Y', strtotime($message_details['message_date'])); ?> || From <span class="text-uppercase font-weight-bold font-italic"><?= $message_details['guest_name']; ?></span>
          </div>

          <div class="card-body">
            <?php
            echo $message_details['guest_message'];
            ?>
          </div>
        </div>

        <a href="messages.php" class="btn btn-success mt-2">Back</a>
      </div>
      <!-- Primary table end -->
    </div>
  </div>
  <!-- main content area end -->

  <!-- admin footer file -->
  <?php require_once "includes/admin_footer.php" ?>