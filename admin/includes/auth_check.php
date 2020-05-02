<?php
    if (!isset($_SESSION['user_name'])) {
        $_SESSION['login_first'] = "Please Sign In First To View The Page!";
        header('location: login.php');
    }
?>