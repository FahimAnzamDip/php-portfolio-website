<div class="page-title-area">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left"><?= $page_title; ?></h4>
        <ul class="breadcrumbs pull-left">
          <li><a href="index.php">Home</a></li>
          <li><span><?= $page_title; ?></span></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-6 clearfix">
      <div class="user-profile pull-right">
        <?php
          $user_name = $_SESSION['user_name'];

          $current_user_query = "SELECT user_name, user_avatar FROM users WHERE user_name = '$user_name'";
          $current_user = mysqli_query($connection, $current_user_query);

          $user = mysqli_fetch_assoc($current_user);
        ?>
        <img class="avatar user-thumb" src="assets/images/author/<?= $user['user_avatar']; ?>" alt="avatar">
        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $user_name; ?><i class="fa fa-angle-down"></i></h4>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="messages.php"><i class="fa fa-commenting-o"></i> Message</a>
          <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
        </div>
      </div>
    </div>
  </div>
</div>