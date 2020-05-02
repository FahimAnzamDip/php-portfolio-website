<?php
session_start();
require_once "admin/includes/db.php";
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <?php
        $select_theme_options_query = "SELECT * FROM theme_options";
        $select_theme_options = mysqli_query($connection, $select_theme_options_query);
        $theme_options = mysqli_fetch_assoc($select_theme_options);
    ?>
    <title><?= $theme_options['owner_name']; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">

    <!--
CSS
============================================= -->

    <link rel="stylesheet" href="front_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="front_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="front_assets/css/themify-icons.css">
    <link rel="stylesheet" href="front_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front_assets/css/style.css">
    <link rel="stylesheet" href="front_assets/css/responsive.css">

    <style>
        ::-webkit-scrollbar {
            width: 10px;
            border-radius: 50px;
        }
        ::-webkit-scrollbar-track {
            background: #dddddd;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, rgba(176,98,251,1) 23%, rgba(195,98,236,1) 68%);
            border-radius: 50px;
            height: 200px;
        }
    </style>

</head>

<body>

    <!-- Preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>