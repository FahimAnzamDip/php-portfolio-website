<?php $title = "Admin - Add contact" ?>
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
    $page_title = "Add contact";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        if (isset($_POST['add_contact'])) {
          $contact_icon = $_POST['contact_icon'];
          $contact_info1 = $_POST['contact_info1'];
          $contact_info2 = $_POST['contact_info2'];

          $add_contact_query = "INSERT INTO contacts (contact_icon, contact_info1, contact_info2) VALUES ('$contact_icon', '$contact_info1', '$contact_info2')";

          $add_contact = mysqli_query($connection, $add_contact_query);
          if (!$add_contact) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['contact_added'] = "contact is successfully added! Add another one?";
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php if (isset($_SESSION['contact_added'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php
                  echo $_SESSION['contact_added'];
                  unset($_SESSION['contact_added']);
                  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Add contact</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="contact_icon">contact Icon</label>
                    <input type="text" id="contact_icon" name="contact_icon">
                  </div>

                  <div class="form-gp">
                    <label for="contact_info1">contact_info1</label>
                    <input type="text" id="contact_info1" name="contact_info1">
                  </div>

                  <div class="form-gp">
                    <label for="contact_info2">contact_info2</label>
                    <input type="text" id="contact_info2" name="contact_info2">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Add contact" name="add_contact">
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