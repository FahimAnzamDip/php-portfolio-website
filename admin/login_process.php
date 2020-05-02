<?php
session_start();
//Database connection
require_once "includes/db.php";

if (isset($_POST['login'])) {

  $email = $_POST['user_email'];
  $password = $_POST['user_password'];
  $final_password = md5($password);

  $login_query = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$final_password'";
  $login = mysqli_query($connection, $login_query);

  if (!$login) {
    die("QUERY FAILED!!" . "</br>" . mysqli_error($connection));
  } else {
    if ($login->num_rows == 1) {
      $user = mysqli_fetch_assoc($login);
      
      if ($user['user_status'] == 1) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_password'] = $user['user_password'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['user_image'] = $user['user_avatar'];
        
        header('location:index.php');
      } else {
        $ban_err = "Your account is Deactivated! You can't login.";
        header('location: login.php?ban_err=' . $ban_err);
      }
    } else {
      $login_err = "You have entered wrong email or password!";
      header('location: login.php?login_err=' . $login_err);
    }
  }
}
