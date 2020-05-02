<?php $title = "Admin - Dashboard" ?>
<!-- admin header file -->
<?php require_once "includes/admin_header.php"; ?>

<!-- check for user login -->
<?php require_once "includes/auth_check.php"; ?>

<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->

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
        $page_title = "Dashboard";
        require_once "includes/admin_page_title.php";
        ?>
        <!-- page title area end -->

        <?php
        $user_count_query = "SELECT COUNT(*) AS 'user_count' FROM users";
        $user_count = mysqli_query($connection, $user_count_query);
        $users = mysqli_fetch_assoc($user_count);

        $message_count_query = "SELECT COUNT(*) AS 'message_count' FROM messages";
        $message_count = mysqli_query($connection, $message_count_query);
        $messages = mysqli_fetch_assoc($message_count);

        $portfolio_count_query = "SELECT COUNT(*) AS 'portfolio_count' FROM portfolios";
        $portfolio_count = mysqli_query($connection, $portfolio_count_query);
        $portfolios = mysqli_fetch_assoc($portfolio_count);

        $select_messages_query = "SELECT * FROM messages ORDER BY message_id DESC LIMIT 3";
        $select_messages = mysqli_query($connection, $select_messages_query); 
        ?>

        <div class="main-content-inner">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card sbg3 text-white">
                            <div class="card-body">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-user"></i>Users:</div>
                                    <h2><?= $users['user_count']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-white">
                        <div class="card sbg2 text-white">
                            <div class="card-body">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-comment-alt"></i>Messages:</div>
                                    <h2><?= $messages['message_count']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-white">
                        <div class="card sbg4 text-white">
                            <div class="card-body">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-view-grid"></i>Portfolis:</div>
                                    <h2><?= $portfolios['portfolio_count']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- testimonial area start -->
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body" style="background-color: #853BFA;">
                                <h4 class="header-title text-white">Lastest Messages</h4>
                                <div class="testimonial-carousel owl-carousel" style="margin-top: 30px;">
                                    <?php foreach ($select_messages as $message): ?>
                                    <div class="tst-item">
                                        <div class="tstu-img" style="border-radius: 0;"> 
                                            <i class="ti-comment-alt text-white" style="font-size: 50px;"></i>
                                        </div>
                                        <div class="tstu-content">
                                            <h4 class="tstu-name"><?= $message['guest_name']; ?></h4>
                                            <span class="profsn mb-4"><?= $message['guest_email']; ?></span>
                                            <p><?= $message['guest_message']; ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->

    <!-- admin footer file -->
    <?php require_once "includes/admin_footer.php" ?>