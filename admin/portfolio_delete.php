<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $portfolio_id = $_GET['portfolio_id'];

  //delete the image first
  $select_image = "SELECT portfolio_image FROM portfolios WHERE portfolio_id = $portfolio_id";
  $image = mysqli_query($connection, $select_image);
  $port_img = mysqli_fetch_assoc($image);
  $image_location = "assets/images/portfolio_img/" . $port_img['portfolio_image'];
  unlink($image_location);

  $delete_query = "DELETE FROM portfolios WHERE portfolio_id = $portfolio_id";

  $_SESSION["delete_msg"] = "Porfolio item has been deleted successfully!";

  $delete_portfolio = mysqli_query($connection, $delete_query);

  if (!$delete_portfolio) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } 
  else {
    header('location: portfolios.php');
  }
