<?php
session_start();
require_once "includes/db.php";

if (isset($_POST['change_user_img'])) {

  $user_id = $_SESSION['user_id'];

  //delete the image first
  if (!empty($_FILES['user_img_file']['name'])) {
    $select_image = "SELECT user_avatar FROM users WHERE user_id = $user_id";
    $image = mysqli_query($connection, $select_image);
    $user_img = mysqli_fetch_assoc($image);
    $image_location = "assets/images/author/" . $user_img['user_avatar'];
    if (!empty($user_img) && $user_img['user_avatar'] != "default.png") {
      unlink($image_location);
    }
  }
  
  $user_img = $_FILES['user_img_file'];
  $img_extension = end(explode('.', $user_img['name']));
  $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

  if (in_array($img_extension, $valid_extensions)) {
    if ($user_img['size'] < 500000) {

      $new_img_name = $user_id . '.' . $img_extension;

      $img_set_location = "assets/images/author/" . $new_img_name;
      move_uploaded_file($user_img['tmp_name'], $img_set_location);

      $user_img_query = "UPDATE users SET user_avatar = '$new_img_name' WHERE user_id = $user_id"; 
      $user_img = mysqli_query($connection, $user_img_query);

      if (!$user_img) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      }
      else {
        $_SESSION['img_changed'] = "Profile image changed.";
        header('location: profile.php');
      }
    }
    else {
      $_SESSION['size_err'] = "Image is too large! Need less than 500kb.";
      header('location: profile.php');
    }
  }
  else {
    $_SESSION['ext_err'] = "Image format must be jpg or png!";
    header('location: profile.php');
  }

}








































?>