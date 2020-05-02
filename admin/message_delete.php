<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $message_id = $_GET['message_id'];
  $delete_query = "DELETE FROM messages WHERE message_id = $message_id";

  $_SESSION["delete_msg"] = "Message has been deleted successfully!";

  $delete_message = mysqli_query($connection, $delete_query);

  if (!$delete_message) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: messages.php');
}
