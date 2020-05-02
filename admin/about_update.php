<?php
session_start();
require_once "includes/db.php";

if (isset($_POST['update_about_texts'])) {
  $about_title = $_POST['about_title'];
  $about_content= $_POST['about_content'];
  $action_text = $_POST['action_text'];
  $action_link = $_POST['action_link'];

  $update_theme_texts_query = "UPDATE about_info SET about_title = '$about_title', about_content = '$about_content', action_text = '$action_text', action_link = '$action_link' WHERE about_id = 1";

  $update_theme_texts = mysqli_query($connection, $update_theme_texts_query);

  if (!$update_theme_texts) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    $_SESSION['about_updated'] = "About Me Successfully Updated!";
    header('location: about.php');
  }
}


if (isset($_POST['update_about_image'])) {

  $owner_image_file = $_FILES['about_image'];
  $owner_image_extension = end(explode('.', $owner_image_file['name']));
  $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

  if (in_array($owner_image_extension, $valid_extensions)) {
    if ($logo_file['size'] < 1000000) {
      //delete the owner image first
      $select_owner_image_query = "SELECT about_image FROM about_info WHERE about_id = 1";
      $select_owner_image = mysqli_query($connection, $select_owner_image_query);
      $owner_image = mysqli_fetch_assoc($select_owner_image);
      $owner_image_location = "../front_assets/img/" . $owner_image['about_image'];
      unlink($owner_image_location);

      
      
      $new_owner_image_name = "about_image" . "." . $owner_image_extension;

      $owner_image_set_location = "../front_assets/img/" . $new_owner_image_name;
      move_uploaded_file($owner_image_file['tmp_name'], $owner_image_set_location);

      $update_owner_image_query = "UPDATE about_info SET about_image = '$new_owner_image_name' WHERE about_id = 1";
      $update_owner_image = mysqli_query($connection, $update_owner_image_query);

      if (!$update_owner_image) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      } else {
        $_SESSION['theme_updated'] = "Theme Options Successfully Updated!";
        header('location: about.php');
      }
    } else {
      $_SESSION['size_err'] = "Image is too large! Need less than 1Mb.";
      header('location: about.php');
    }
  } else {
    $_SESSION['ext_err'] = "Image format must be jpg or png!";
    header('location: about.php');
  }
}
