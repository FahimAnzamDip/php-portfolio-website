<?php
ob_start(); 
$title = "Admin - Edit Contact" 
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
    $page_title = "Edit Contact";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <div class="main-content-inner">

      <?php
        $contact_id = $_GET['contact_id'];
        $get_contact_query = "SELECT * FROM contacts WHERE contact_id = '$contact_id'";
        $get_contact = mysqli_query($connection, $get_contact_query);
        if (!$get_contact) {
          die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
        } 
        else {
          $contact = mysqli_fetch_assoc($get_contact);
        }

        if (isset($_POST['update_contact'])) {
          $contact_icon = $_POST['contact_icon'];
          $contact_info1 = $_POST['contact_info1'];
          $contact_info2 = $_POST['contact_info2'];

          $update_contact_query = "UPDATE contacts SET contact_icon = '$contact_icon', contact_info1 = '$contact_info1', contact_info2 = '$contact_info2' WHERE contact_id = $contact_id";

          $update_contact = mysqli_query($connection, $update_contact_query);
          if (!$update_contact) {
            die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
          } else {
            $_SESSION['contact_updated'] = "contact is successfully updated!";
            header('location: contacts.php');
          }
        }        
      ?>

      <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" class="mt-3">
                <div class="login-form-head">
                  <h4 id="chp">Edit contact</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label for="contact_icon"></label>
                    <input type="text" id="contact_icon" name="contact_icon" 
                    value="<?= $contact['contact_icon']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="contact_info1"></label>
                    <input type="text" id="contact_info1" name="contact_info1" 
                    value="<?= $contact['contact_info1']; ?>">
                  </div>

                  <div class="form-gp">
                    <label for="contact_info2"></label>
                    <input type="text" id="contact_info2" name="contact_info2" 
                    value="<?= $contact['contact_info2']; ?>">
                  </div>

                  <input class="btn btn-outline-primary btn-block" type="submit" value="Update contact" name="update_contact">
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