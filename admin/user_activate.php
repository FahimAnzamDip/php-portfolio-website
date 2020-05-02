<?php
  //Database connection
  require_once "includes/db.php";

  $user_id = $_GET['user_id'];
  $user_status = 1;
  $active_query = "UPDATE users SET user_status = $user_status WHERE user_id = $user_id";

  $active_user = mysqli_query($connection, $active_query);

  if (!$active_user) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  }
  else {
    header('location: users.php');
}
