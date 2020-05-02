<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $menu_id = $_GET['menu_id'];
  $delete_query = "DELETE FROM menus WHERE menu_id = $menu_id";

  $_SESSION["delete_msg"] = "Menu Item has been deleted successfully!";

  $delete_menu = mysqli_query($connection, $delete_query);

  if (!$delete_menu) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: menus.php');
}
