<?php
session_start();
session_destroy();

session_start();
$_SESSION['logged_out'] = "Successfully Signed Out! You can signin again if you want. ;)";

header('location: login.php');