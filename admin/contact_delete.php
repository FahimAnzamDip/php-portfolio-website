<?php
  session_start();
  //Database Connection
  require_once "includes/db.php";

  $contact_id = $_GET['contact_id'];
  $delete_query = "DELETE FROM contacts WHERE contact_id = $contact_id";

  $_SESSION["delete_msg"] = "contact has been deleted successfully!";

  $delete_contact = mysqli_query($connection, $delete_query);

  if (!$delete_contact) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    header('location: contacts.php');
}
