<header class="header-area" id="header-area">
  <div class="dope-nav-container breakpoint-off">
    <div class="container">
      <div class="row">
        <!-- dope Menu -->
        <nav class="dope-navbar justify-content-between" id="dopeNav">

          <!-- Logo -->
          <a class="nav-brand" href="index.php">
            <?php
              $theme_options_query = "SELECT * FROM theme_options";
              $theme_options = mysqli_query($connection, $theme_options_query);
            
              $get_theme_options = mysqli_fetch_assoc($theme_options);
            ?>
            <img width="150" src="front_assets/img/<?= $get_theme_options['logo']; ?>" alt="">
          </a>

          <!-- Navbar Toggler -->
          <div class="dope-navbar-toggler">
            <span class="navbarToggler">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>

          <!-- Menu -->
          <div class="dope-menu">

            <!-- close btn -->
            <div class="dopecloseIcon">
              <div class="cross-wrap">
                <span class="top"></span>
                <span class="bottom"></span>
              </div>
            </div>

            <?php
              $show_menus_query = "SELECT * FROM menus";
              $show_menus = mysqli_query($connection, $show_menus_query);
              if (!$show_menus) {
                die("QUERY FAILED!" . "</br>" . mysqli_error($connection));
              }
            ?>

            <!-- Nav Start -->
            <div class="dopenav">
              <ul id="nav">
                <?php foreach ($show_menus as $menu): ?>
                <li>
                  <a href="<?= $menu['menu_link']; ?>"><?= $menu['menu_title']; ?></a>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
            <!-- Nav End -->
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>