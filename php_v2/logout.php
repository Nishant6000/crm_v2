<?php
include('../db_v2/config.php');
session_start();
$table_name = "attendance";
$user_name = $_SESSION["optin_user"];
$user_name = str_ireplace("optin_","",$user_name);
$date = date('Y-m-d');
$time = date('h:i');
session_destroy();
header('location: ../index.php')
?>