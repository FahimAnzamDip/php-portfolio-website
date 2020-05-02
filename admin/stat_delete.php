<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $stat_id = $_GET['stat_id'];
  $delete_query = "DELETE FROM stats WHERE stat_id = $stat_id";

  $_SESSION["delete_msg"] = "stat has been deleted successfully!";

  $delete_stat = mysqli_query($connection, $delete_query);

  if (!$delete_stat) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: stats.php');
}
