<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $service_id = $_GET['service_id'];
  $delete_query = "DELETE FROM services WHERE service_id = $service_id";

  $_SESSION["delete_msg"] = "Service has been deleted successfully!";

  $delete_service = mysqli_query($connection, $delete_query);

  if (!$delete_service) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: services.php');
}
