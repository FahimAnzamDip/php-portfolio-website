<?php
session_start();
require_once "../admin/includes/db.php";

if (!empty($_POST['guest_name']) && $_POST['guest_email'] && $_POST['guest_message']) {
  date_default_timezone_set('Asia/Dhaka');

  $guest_name = $_POST['guest_name'];
  $guest_email = $_POST['guest_email'];
  $guest_message = $_POST['guest_message'];
  $message_date = date('Y-m-d H:i:s');

  $insert_contact_query = "INSERT INTO messages (guest_name, guest_email, guest_message, message_date) VALUES ('$guest_name', '$guest_email', '$guest_message', '$message_date')";

  $insert_contact = mysqli_query($connection, $insert_contact_query);
  if (!$insert_contact) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    $_SESSION['message_sent'] = "We recieved your message. Thanks for your valueable thoughts.";
    header('location: ../index.php#contact-form');
  }
} else {
  $_SESSION['message_not_sent'] = "All fields needed!";
  header('location: ../index.php#contact-form');
}

