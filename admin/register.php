<?php $title = "Register" ?>
<!-- admin header file -->
<?php require_once "includes/admin_header.php"; ?>

<!-- login area start -->
<div class="login-area">
  <div class="container">
    <div class="login-box ptb--100">
      <form action="reg_process.php" method="post">
        <div class="login-form-head">
          <h4><i class="ti-user"></i> Sign up</h4>
          <p>Hello there, Sign up and Join with Us!</p>
        </div>
        <div class="login-form-body">
          <div class="form-gp">
            <label for="user_name"></label>
            <input type="text" id="user_name" name="user_name" value="<?php
                  if (isset($_GET['current_name'])) {
                      echo $_GET['current_name'];
                    }
                ?>" placeholder="User Name">
            <i class="ti-user"></i>
            <div class="text-danger">
              <?php if (isset($_GET['name_err'])): ?>
                <p class="text-danger"><?php echo $_GET['name_err'] ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-gp">
            <label for="user_email"></label>
            <input type="email" id="user_email" name="user_email" value="<?php
                  if (isset($_GET['current_email'])) {
                      echo $_GET['current_email'];
                    }
                ?>" placeholder="Email">
            <i class="ti-email"></i>
            <div class="text-danger">
              <?php if (isset($_GET['email_err'])): ?>
                <p class="text-danger"><?php echo $_GET['email_err'] ?></p>
              <?php endif; ?>

              <?php if (isset($_GET['email_err_aa'])): ?>
                <p class="text-danger"><?php echo $_GET['email_err_aa'] ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-gp">
            <label for="user_password"></label>
            <input type="password" id="user_password" name="user_password" value="<?php
                  if (isset($_GET['password'])) {
                      echo $_GET['password'];
                    }
                  ?>" placeholder="Password">
            <i class="ti-lock"></i>
            <div class="text-danger">
              <?php if (isset($_GET['password_err'])): ?>
                <p class="text-danger"><?php echo $_GET['password_err'] ?></p>
              <?php endif; ?>

              <?php if (isset($_GET['pass_err'])): ?>
                <p class="text-danger"><?php echo $_GET['pass_err'] ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-gp">
            <label for="user_confirm_password"></label>
            <input type="password" id="user_confirm_password" name="user_confirm_password" value="<?php
                  if (isset($_GET['confirm_password'])) {
                    echo $_GET['confirm_password'];
                  }
                ?>" placeholder="Confirm Password">
            <i class="ti-lock"></i>
            <div class="text-danger">
              <?php if (isset($_GET['password_err2'])): ?>
                <p class="text-danger"><?php echo $_GET['password_err2'] ?></p>
              <?php endif; ?>

              <?php if (isset($_GET['not_match'])): ?>
                <p class="text-danger"><?php echo $_GET['not_match'] ?></p>
              <?php endif; ?>
            </div>
          </div>
          
          <input class="btn btn-outline-primary btn-block" type="submit" value="Sign up" name="login">

          <div class="form-footer text-center mt-5">
            <p class="text-muted">Already have an account? <a href="login.php">Sign in</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- login area end -->

<!-- admin footer file -->
<?php require_once "includes/admin_footer.php" ?>