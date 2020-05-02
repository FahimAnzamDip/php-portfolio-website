<?php

//Database connection
require_once "includes/db.php";

//Password Conditions check
$upper_case = preg_match('@[A-Z]@', $_POST['user_password']);
$lower_case = preg_match('@[a-z]@', $_POST['user_password']);
$number = preg_match('@[0-9]@', $_POST['user_password']);
$special_char = preg_match('@[#, $, %]@', $_POST['user_password']);

//Name error check
if (empty($_POST['user_name'])) {
  $name_err = "Please provide your name!";
  header('location: register.php?name_err=' . $name_err);
}

//Email error check
else if (empty($_POST['user_email'])) {
  $email_err = "Please provide your email!";
  $current_name = $_POST['user_name'];
  header('location: register.php?email_err=' . $email_err . '&current_name=' . $current_name);
}

//Password error check
else if (empty($_POST['user_password'])) {
  $password_err = "Please provide your password!";
  $current_name = $_POST['user_name'];
  $current_email = $_POST['user_email'];
  header('location: register.php?password_err=' . $password_err . '&current_name=' . $current_name .
    '&current_email=' . $current_email);
}
//Password error check
else if (!$upper_case || !$lower_case || !$number || !$special_char) {
  $pass_err = "Need a password with an uppercase, a lowercase, numbers, a special character!";
  $current_name = $_POST['user_name'];
  $current_email = $_POST['user_email'];
  $password = $_POST['user_password'];
  header('location: register.php?pass_err=' . $pass_err . '&current_name=' . $current_name .
    '&current_email=' . $current_email . '&password=' . $password);
}
//Password error check
else if (empty($_POST['user_confirm_password'])) {
  $password_err2 = "Please provide your password again!";
  $current_name = $_POST['user_name'];
  $current_email = $_POST['user_email'];
  $password = $_POST['user_password'];
  header('location: register.php?password_err2=' . $password_err2 . '&current_name=' . $current_name .
    '&current_email=' . $current_email . '&password=' . $password);
}
//Macthing confirm password
else if ($_POST['password'] != $_POST['confirm_password']) {
  $not_match = "Password is not matching! Enter again.";
  $current_name = $_POST['user_name'];
  $current_email = $_POST['user_email'];
  $password = $_POST['user_password'];
  header('location: register.php?not_match=' . $not_match . '&current_name=' . $current_name .
    '&current_email=' . $current_email . '&password=' . $password);
}

//After validaton successfull
else {
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $final_password = md5($user_password);

  //Insert Data into Database
  $insert_query = "INSERT INTO users(user_name, user_email, user_password)";
  $insert_query .= "VALUES('$user_name', '$user_email', '$final_password')";

  //Email availability check in Database
  $email_error_check = "SELECT * FROM users WHERE user_email = '$user_email'";
  $email_err_ch_query = mysqli_query($connection, $email_error_check);

  if ($email_err_ch_query->num_rows == 1) {
    $email_err_aa = "This email is already used! Please use another email.";
    $current_name = $_POST['user_name'];
    $current_email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $confirm_password = $_POST['user_confirm_password'];

    header('location: register.php?email_err_aa=' . $email_err_aa . '&current_name=' . $current_name .
      '&current_email=' . $current_email . '&password=' . $password . '&confirm_password=' . $confirm_password);
  } else {
    //Insert Data into Database
    $insert_to_db = mysqli_query($connection, $insert_query);

    if (!$insert_to_db) {
      die("Query Failed!" . "</br>" . mysqli_error($connection));
    } else {
      $success = "You registered successfully! You can login now.";
      header('location: login.php?success=' . $success);
    }
  }
}
