<!-- sidebar menu area start -->
<div class="sidebar-menu">
  <div class="sidebar-header">
    <div class="user-box">
      <div class="user-img">
        <img width="90" height="90" src="assets/images/author/<?= $_SESSION['user_image'] ?>" class="rounded-circle img-fluid ml-auto mr-auto d-block mb-2">
      </div>
      <h6 class="text-white text-center"><?= $_SESSION['user_name'] ?></h6>
      <p class="text-muted text-white text-center"><?= $_SESSION['user_email'] ?></p>
    </div>
  </div>
  <div class="main-menu">
    <div class="menu-inner">
      <nav>
        <ul class="metismenu" id="menu">
          <li class=""><a href="index.php"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>

          <li><a href="theme_option.php"><i class="fa fa-puzzle-piece"></i><span>Theme</span></a></li>

          <li><a href="users.php"><i class="fa fa-users"></i><span>Users</span></a></li>

          <li><a href="profile.php"><i class="ti-user"></i><span>Profile</span></a></li>

          <li><a href="messages.php"><i class="fa fa-commenting-o"></i><span>Messages</span></a></li>

          <li><a href="about.php"><i class="fa fa-flash"></i><span>About</span></a></li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-bars"></i><span>Menus</span></a>
            <ul class="collapse">
              <li><a href="menu_add.php">Add Menu</a></li>
              <li><a href="menus.php">All Menus</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-code"></i><span>Skills</span></a>
            <ul class="collapse">
              <li><a href="skill_add.php">Add Skill</a></li>
              <li><a href="skills.php">All Skills</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-briefcase"></i><span>Services</span></a>
            <ul class="collapse">
              <li><a href="services_add.php">Add Service</a></li>
              <li><a href="services.php">All Services</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-book"></i><span>Educations</span></a>
            <ul class="collapse">
              <li><a href="education_add.php">Add Education</a></li>
              <li><a href="educations.php">All Educations</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="ti-comments-smiley"></i><span>Feedbacks</span></a>
            <ul class="collapse">
              <li><a href="feedback_add.php">Add Feedback</a></li>
              <li><a href="feedbacks.php">All Feedback</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-th"></i><span>Portfolios</span></a>
            <ul class="collapse">
              <li><a href="portfolio_add.php">Add Portfolio</a></li>
              <li><a href="portfolios.php">All Portfolios</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-line-chart"></i><span>Stats</span></a>
            <ul class="collapse">
              <li><a href="stat_add.php">Add Stat</a></li>
              <li><a href="stats.php">All Stats</a></li>
            </ul>
          </li>

          <li>
            <a href="#" aria-expanded="true"><i class="fa fa-info-circle"></i><span>Contacts</span></a>
            <ul class="collapse">
              <li><a href="contact_add.php">Add Contact</a></li>
              <li><a href="contacts.php">All Contacts</a></li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- sidebar menu area end -->