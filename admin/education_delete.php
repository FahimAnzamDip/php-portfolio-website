<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $education_id = $_GET['education_id'];
  $delete_query = "DELETE FROM educations WHERE education_id = $education_id";

  $_SESSION["delete_msg"] = "education has been deleted successfully!";

  $delete_education = mysqli_query($connection, $delete_query);

  if (!$delete_education) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: educations.php');
}
