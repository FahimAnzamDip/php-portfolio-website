<?php $title = "Admin - Contacts"; ?>
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
    $page_title = "Contacts";
    require_once "includes/admin_page_title.php";
    ?>
    <!-- page title area end -->

    <?php

    $read_contacts_query = "SELECT * FROM contacts ORDER BY contact_id desc";
    $read_contacts = mysqli_query($connection, $read_contacts_query);
    if (!$read_contacts) {
      die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
    }

    ?>

    <div class="main-content-inner">
      <!-- Primary table start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <!--contact updated-->
            <?php if (isset($_SESSION['contact_updated'])) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['contact_updated'];
                unset($_SESSION['contact_updated']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <!--contact Deleted-->
            <?php if (isset($_SESSION['delete_msg'])) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['delete_msg'];
                unset($_SESSION['delete_msg']);
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <h4 class="header-title">contacts Table</h4>
            <div class="data-tables datatable-primary">
              <table id="dataTable2" class="text-center">
                <thead class="text-capitalize">
                  <tr>
                    <th>Serial No</th>
                    <th>Contact Icon</th>
                    <th>Contact Info1</th>
                    <th>Contact Info2</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $serial = 1; ?>
                  <?php foreach ($read_contacts as $contact) : ?>
                    <tr>
                      <td><?= $serial++ ?></td>
                      <td><i style="font-size: 50px;" class="<?= $contact['contact_icon']; ?>"></i></td>
                      <td><?= $contact['contact_info1']; ?></td>
                      <td><?= $contact['contact_info2']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="contact_edit.php?<?php echo "contact_id=" . $contact['contact_id'] ?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                          <a href="contact_delete.php?<?php echo "contact_id=" . $contact['contact_id'] ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Primary table end -->
    </div>
  </div>
  <!-- main content area end -->

  <!-- admin footer file -->
  <?php require_once "includes/admin_footer.php" ?>