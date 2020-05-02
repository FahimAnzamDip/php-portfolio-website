<?php
session_start();
require_once "includes/db.php";

  if (isset($_POST['update'])) {
    $user_id = $_SESSION['user_id'];
    $old_password = $_SESSION['user_password'];
    $password = $_POST['user_password'];
    $new_password = md5($_POST['user_password']);
    $confirm_password = md5($_POST['user_confirm_password']);
    $entered_old_password = md5($_POST['user_old_password']);


    if (empty($_POST['user_old_password']) || empty($_POST['user_password']) || empty($_POST['user_new_password'])) {
      $_SESSION['err1'] = "Any field can't be empty!";
      header('location: change_password.php');
    }

    if ($old_password != $entered_old_password) {
      $_SESSION['err2'] = "Enter correct old password!";
      header('location: change_password.php');
    }

    else if ($old_password == $new_password) {
      $_SESSION['err3'] = "Your old password can't be you new password!";
      header('location: change_password.php');
    }

    else if (strlen($password) < 6) {
      $_SESSION['err4'] = "New password is too short!";
      header('location: change_password.php');
    }

    else if ($new_password != $confirm_password) {
      $_SESSION['err5'] = "Your new password and confirm password doesn't match!";
      header('location: change_password.php');
    }

    else {
      $update_pass_query = "UPDATE users SET user_password = '$new_password' WHERE user_id = $user_id";
      $update_password = mysqli_query($connection, $update_pass_query);

      if (!$update_password) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      } else {
        $_SESSION['changed_pass'] = "Password changed successfully! Please signin again.";
        header('location: login.php');
      }
    }
  }
?>
































