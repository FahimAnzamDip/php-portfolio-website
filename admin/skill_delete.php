<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $skill_id = $_GET['skill_id'];
  $delete_query = "DELETE FROM skills WHERE skill_id = $skill_id";

  $_SESSION["delete_msg"] = "skill has been deleted successfully!";

  $delete_skill = mysqli_query($connection, $delete_query);

  if (!$delete_skill) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: skills.php');
}
