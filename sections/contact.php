<?php
// require_once "admin/includes/db.php";

  $show_contacts_query = "SELECT * FROM contacts";
  $show_contacts = mysqli_query($connection, $show_contacts_query);
  if (!$show_contacts) {
    die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
  }
?>


<section class="contact-section padding-top-120" id="contact-section">
  <div class="container">
    <div class="section-title">
      <h2 class="text-center">Contact Me</h2>
      <p class="text-center">Get in Touch With Me</p>
    </div>
    <div class="row address-wrap justify-content-center" id="contact-form">
      <?php foreach ($show_contacts as $contact): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 single-address-col">
        <i class="<?= $contact['contact_icon']; ?>"></i>
        <p>
          <?= $contact['contact_info1']; ?>
          <br>
          <?= $contact['contact_info2']; ?>
        </p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="row justify-content-center form-row">
      <div class="col-lg-9">
        <!-- Message sent info -->
        <?php if (isset($_SESSION['message_sent'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message_sent'];
            unset($_SESSION['message_sent']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <!-- Message not sent info -->
        <?php if (isset($_SESSION['message_not_sent'])) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message_not_sent'];
            unset($_SESSION['message_not_sent']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <form action="process/contact_process.php" method="post">
          <div class="row contact-form-wrap justify-content-center">
            <div class="col-md-6 contact-name form-col">
              <input name="guest_name" class="form-control" type="text" placeholder="Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Name*'">
            </div>
            <div class="col-md-6 contact-email form-col">
              <input name="guest_email" class="form-control" type="email" placeholder="E-mail*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'">
            </div>
            <div class="col-lg-12">
              <textarea name="guest_message" class="form-control" rows="5" placeholder="Message" onfocus="this.placeholder=''" onblur="this.placeholder='Message*'"></textarea>
            </div>
            <input style="cursor: pointer;" type="submit" class="primary-btn" value="Send Message" name="send">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>