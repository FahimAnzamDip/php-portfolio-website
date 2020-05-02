<?php
session_start();
require_once "includes/db.php";

if (isset($_POST['update_theme_texts'])) {
  $owner_name = $_POST['owner_name'];
  $owner_title = $_POST['owner_title'];
  $action_text = $_POST['action_text'];
  $action_link = $_POST['action_link'];

  $update_theme_texts_query = "UPDATE theme_options SET owner_name = '$owner_name', owner_title = '$owner_title', action_text = '$action_text', action_link = '$action_link' WHERE option_id = 1";

  $update_theme_texts = mysqli_query($connection, $update_theme_texts_query);

  if (!$update_theme_texts) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  } else {
    $_SESSION['theme_updated'] = "Theme Options Successfully Updated!";
    header('location: theme_option.php');
  }
}


if (isset($_POST['update_theme_logo'])) {

  if (in_array($logo_extension, $valid_extensions)) {
    if ($logo_file['size'] < 500000) {
      //delete the logo first
      $select_logo_query = "SELECT logo FROM theme_options WHERE option_id = 1";
      $select_logo = mysqli_query($connection, $select_logo_query);
      $logo = mysqli_fetch_assoc($select_logo);
      $logo_location = "../front_assets/img/" . $logo['logo'];
      unlink($logo_location);

      $logo_file = $_FILES['logo'];
      $logo_extension = end(explode('.', $logo_file['name']));
      $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

      $new_logo_name = "logo" . "." . $logo_extension;

      $logo_set_location = "../front_assets/img/" . $new_logo_name;
      move_uploaded_file($logo_file['tmp_name'], $logo_set_location);

      $update_logo_query = "UPDATE theme_options SET logo = '$new_logo_name' WHERE option_id = 1";
      $update_logo = mysqli_query($connection, $update_logo_query);

      if (!$update_logo) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      } else {
        $_SESSION['theme_updated'] = "Theme Options Successfully Updated!";
        header('location: theme_option.php');
      }
    } else {
      $_SESSION['size_err'] = "Image is too large! Need less than 500kb.";
      header('location: theme_option.php');
    }
  } else {
    $_SESSION['ext_err'] = "Image format must be jpg or png!";
    header('location: theme_option.php');
  }
}


if (isset($_POST['update_theme_owner_image'])) {

  if (in_array($owner_image_extension, $valid_extensions)) {
    if ($logo_file['size'] < 1000000) {
      //delete the owner image first
      $select_owner_image_query = "SELECT owner_image FROM theme_options WHERE option_id = 1";
      $select_owner_image = mysqli_query($connection, $select_owner_image_query);
      $owner_image = mysqli_fetch_assoc($select_owner_image);
      $owner_image_location = "../front_assets/img/" . $owner_image['owner_image'];
      unlink($owner_image_location);

      $owner_image_file = $_FILES['owner_image'];
      $owner_image_extension = end(explode('.', $owner_image_file['name']));
      $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');
      
      $new_owner_image_name = "owner_image" . "." . $owner_image_extension;

      $owner_image_set_location = "../front_assets/img/" . $new_owner_image_name;
      move_uploaded_file($owner_image_file['tmp_name'], $owner_image_set_location);

      $update_owner_image_query = "UPDATE theme_options SET owner_image = '$new_owner_image_name' WHERE option_id = 1";
      $update_owner_image = mysqli_query($connection, $update_owner_image_query);

      if (!$update_owner_image) {
        die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
      } else {
        $_SESSION['theme_updated'] = "Theme Options Successfully Updated!";
        header('location: theme_option.php');
      }
    } else {
      $_SESSION['size_err'] = "Image is too large! Need less than 1Mb.";
      header('location: theme_option.php');
    }
  } else {
    $_SESSION['ext_err'] = "Image format must be jpg or png!";
    header('location: theme_option.php');
  }
}
