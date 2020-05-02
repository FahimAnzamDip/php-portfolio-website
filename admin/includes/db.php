<?php

  //DEFINING DATABASE RELATED VALUES
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'myportfolio');

  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if (!$connection) {
    die("Database Connection Failed!" . "</br>" . mysqli_error($connection));
  }

?>