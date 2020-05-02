<?php
ob_start(); 
$title = "Admin - Edit Feedback" 
?>
<!-- admin header file -->
<?php require_once "includes/admin_header.php"; ?>

<!-- check for user login -->
<?php require_once "includes/auth_check.php"; ?>

<!-- page container area start -->
<div class="page-container">

  <!-- admin navigation file -->
  <?php require_once "includes/admin_navigation.php"; ?>

  <!-- main content area start -->
  <div class="main-content">
    <!-- admin search bar file -->
    <?php require_once "includes/admin_search.php"; ?>

    <!-- page title area start -->
    <?php
    $page_title = "Edit Feedback";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        $feedback_id = $_GET['feedback_id'];

        $get_feedback_query = "SELECT * FROM feedbacks WHERE feedback_id = '$feedback_id'";
        $get_feedback = mysqli_query($connection, $get_feedback_query);
        if (!$get_feedback) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } 
        else {
          $feedback = mysqli_fetch_assoc($get_feedback);
        }

        if (isset($_POST['update_feedback'])) {
          if (!empty($_FILES['feedback_image']['name'])) {
            //delete the image first
            $select_image = "SELECT feedback_image FROM feedbacks WHERE feedback_id = $feedback_id";
            $image = mysqli_query($connection, $select_image);
            $feed_img = mysqli_fetch_assoc($image);
            $image_location = "assets/images/feedback_img/" . $feed_img['feedback_image'];
            unlink($image_location);

            $feedback_image = $_FILES['feedback_image'];
            $feedback_title = $_POST['feedback_title'];
            $feedback_sub_title = $_POST['feedback_sub_title'];
            $feedback_content = $_POST['feedback_content'];

            $img_extension = explode('.', $feedback_image['name']);
            $img_extension = end($img_extension);

            $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

            if (in_array($img_extension, $valid_extensions)) {
              if ($feedback_image['size'] < 1000000) {

                $update_feedback_query = "UPDATE feedbacks SET feedback_title = '$feedback_title', feedback_sub_title = '$feedback_sub_title', feedback_content = '$feedback_content' WHERE feedback_id = $feedback_id";
                $update_feedback = mysqli_query($connection, $update_feedback_query);

                $new_img_name = $feedback_id . '.' . $img_extension;

                $img_set_location = "assets/images/feedback_img/" . $new_img_name;
                move_uploaded_file($feedback_image['tmp_name'], $img_set_location);

                $feedback_img_query = "UPDATE feedbacks SET feedback_image = '$new_img_name' WHERE feedback_id = $feedback_id";
                $feedback_img = mysqli_query($connection, $feedback_img_query);

                if (!$feedback_img) {
                  die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
                }
                else {
                  $_SESSION['feedback_updated'] = "feedback is successfully updated!";
                  header('location: feedbacks.php');
                } 

              } 
              else {
                $_SESSION['size_err'] = "Image is too large! Need less than 1MB.";
              }
            } 
            else {
              $_SESSION['ext_err'] = "Image format must be jpg or png!";
            }
          }
          else {
            $feedback_title = $_POST['feedback_title'];
            $feedback_sub_title = $_POST['feedback_sub_title'];
            $feedback_content = $_POST['feedback_content'];
  
            $update_feedback_query = "UPDATE feedbacks SET feedback_title = '$feedback_title', feedback_sub_title = '$feedback_sub_title', feedback_content = '$feedback_content' WHERE feedback_id = $feedback_id";
  
            $update_feedback = mysqli_query($connection, $update_feedback_query);
            if (!$update_feedback) {
              die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
            } else {
              $_SESSION['feedback_updated'] = "feedback is successfully updated!";
              header('location: feedbacks.php');
            }
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div class="login-form-head">
                  <h4 id="chp">Edit feedback</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="feedback_image"></label>
                    <input type="file" id="feedback_image" name="feedback_image" 
                    value="<?= $feedback['feedback_image']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="feedback_title"></label>
                    <input type="text" id="feedback_title" name="feedback_title" 
                    value="<?= $feedback['feedback_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="feedback_sub_title"></label>
                    <input type="text" id="feedback_sub_title" name="feedback_sub_title" 
                    value="<?= $feedback['feedback_sub_title']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="feedback_content"></label>
                    <input type="text" id="feedback_content" name="feedback_content" 
                    value="<?= $feedback['feedback_content']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update feedback" name="update_feedback">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- main content area end -->

  <!-- admin footer file -->
  <?php require_once "includes/admin_footer.php" ?>