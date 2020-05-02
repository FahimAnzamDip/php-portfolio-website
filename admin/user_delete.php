<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $user_id = $_GET['user_id'];

  //delete the image first
  $select_image = "SELECT user_avatar FROM users WHERE user_id = $user_id";
  $image = mysqli_query($connection, $select_image);
  $user_img = mysqli_fetch_assoc($image);
  $image_location = "assets/images/author/" . $user_img['user_avatar'];
  unlink($image_location);

  $delete_query = "DELETE FROM users WHERE user_id = $user_id";

  $_SESSION["delete_msg"] = "User has been deleted successfully!";

  $delete_user = mysqli_query($connection, $delete_query);

  if (!$delete_user) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: users.php');
}
