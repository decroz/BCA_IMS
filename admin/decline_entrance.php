<?php
require "include/security.php";
require "alert_message.php";
$email = $_GET['email'];
$name =$_GET['name'];

//database connection
require_once "include/connection.php";
require "phpmailer/ent_email.php";
header('location:index.php');
?>