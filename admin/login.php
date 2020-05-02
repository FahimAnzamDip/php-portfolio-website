<?php $title = "Login" ?>
<!-- admin header file -->
<?php require_once "includes/admin_header.php"; ?>

<!-- login area start -->
<div class="login-area">
  <div class="container">
    <div class="login-box ptb--100">
      <form action="login_process.php" method="post">
        <div class="login-form-head">
          <h4><i class="ti-user"></i> Sign In</h4>
        </div>
        <div class="login-form-body">

        <!--Registration successfull message-->
          <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $_GET['success']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <!--Deactivated error-->
          <?php if (isset($_GET['ban_err'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_GET['ban_err']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          <!--Login error-->
          <?php if (isset($_GET['login_err'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_GET['login_err']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          <!-- Not Logged in error-->
          <?php if (isset($_SESSION['login_first'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
              echo $_SESSION['login_first']; 
              unset($_SESSION['login_first']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
           <!-- Logged out message-->
           <?php if (isset($_SESSION['logged_out'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php 
                echo $_SESSION['logged_out']; 
                unset($_SESSION['logged_out']);
              ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <!-- password changed message-->
          <?php if (isset($_SESSION['changed_pass'])): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php 
              echo $_SESSION['changed_pass']; 
              unset($_SESSION['changed_pass']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>

          <div class="form-gp">
            <label for="user_email"></label>
            <input type="email" id="user_email" name="user_email" placeholder="Email address">
            <i class="ti-email"></i>
            <div class="text-danger"></div>
          </div>

          <div class="form-gp">
            <label for="user_password"></label>
            <input type="password" id="user_password" name="user_password" placeholder="Password">
            <i class="ti-lock"></i>
            <div class="text-danger"></div>
          </div>
        
          <div class="submit-btn-area">
            <button id="login" type="submit" name="login">Submit <i class="ti-arrow-right"></i></button>
          </div>

          <div class="form-footer text-center mt-4">
            <p class="text-muted">Don't have an account? <a href="register.php">Sign up</a></p>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
<!-- login area end -->

<!-- admin footer file -->
<?php require_once "includes/admin_footer.php" ?>