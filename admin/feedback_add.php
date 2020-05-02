<?php $title = "Admin - Add feedback" ?>
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
    $page_title = "Add feedback";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
      if (isset($_POST['add_feedback'])) {

        $feedback_image = $_FILES['feedback_image'];
        $feedback_title = $_POST['feedback_title'];
        $feedback_sub_title = $_POST['feedback_sub_title'];
        $feedback_content = $_POST['feedback_content'];

        $img_extension = explode('.', $feedback_image['name']);
        $img_extension = end($img_extension);

        $valid_extensions = array('JPG', 'jpg', 'PNG', 'png', 'JPEG', 'jpeg');

        if (in_array($img_extension, $valid_extensions)) {
          if ($feedback_image['size'] < 500000) {

            $insert_feedback_query = "INSERT INTO feedbacks (feedback_title, feedback_sub_title, feedback_content) VALUES ('$feedback_title', '$feedback_sub_title', '$feedback_content')";
            $insert_feedback = mysqli_query($connection, $insert_feedback_query);

            $feedback_id = mysqli_insert_id($connection);

            $new_img_name = $feedback_id . '.' . $img_extension;

            $img_set_location = "assets/images/feedback_img/" . $new_img_name;
            move_uploaded_file($feedback_image['tmp_name'], $img_set_location);

            $feedback_img_query = "UPDATE feedbacks SET feedback_image = '$new_img_name' WHERE feedback_id = $feedback_id";
            $feedback_img = mysqli_query($connection, $feedback_img_query);

            if (!$feedback_img) {
              die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
            }
            else {
              $_SESSION['feedback_added'] = "feedback Added! Add another one?";
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
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['feedback_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['feedback_added'];
                  unset($_SESSION['feedback_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php if (isset($_SESSION['ext_err'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['ext_err'];
                  unset($_SESSION['ext_err']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php if (isset($_SESSION['size_err'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['size_err'];
                  unset($_SESSION['size_err']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div class="login-form-head">
                  <h4 id="chp">Add feedback Item</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="feedback_image"></label>
                    <input type="file" name="feedback_image">
                  </div>

                  <div class="form-gp">
                    <label for="feedback_title">Feedback Title</label>
                    <input type="text" name="feedback_title">
                  </div>

                  <div class="form-gp">
                    <label for="feedback_sub_title">Feedback Sub Title</label>
                    <input type="text" name="feedback_sub_title">
                  </div>

                  <div class="form-gp">
                    <label for="feedback_content"></label>
                    <textarea style="padding: 10px" cols="43" rows="6" type="text" name="feedback_content" placeholder="Feedback Content"></textarea>
                  </div>


                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add feedback" name="add_feedback">
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