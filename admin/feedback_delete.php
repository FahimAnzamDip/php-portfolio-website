<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $feedback_id = $_GET['feedback_id'];

  //delete the image first
  $select_image = "SELECT feedback_image FROM feedbacks WHERE feedback_id = $feedback_id";
  $image = mysqli_query($connection, $select_image);
  $feed_img = mysqli_fetch_assoc($image);
  $image_location = "assets/images/feedback_img/" . $feed_img['feedback_image'];
  unlink($image_location);

  $delete_query = "DELETE FROM feedbacks WHERE feedback_id = $feedback_id";

  $_SESSION["delete_msg"] = "Porfolio item has been deleted successfully!";

  $delete_feedback = mysqli_query($connection, $delete_query);

  if (!$delete_feedback) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } 
  else {
    header('location: feedbacks.php');
  }
