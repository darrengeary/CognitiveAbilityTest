<?php

// $dbServerName = "localhost";
// $dbUserName = "root";
// $dbPassword = "root";
// $dbName = "quiztime";

$dbServerName = "mysql1.it.nuigalway.ie";
$dbUserName = "mydb4746pp";
$dbPassword = "ze0diw";
$dbName = "mydb4746";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

mysqli_set_charset($conn, "utf8");