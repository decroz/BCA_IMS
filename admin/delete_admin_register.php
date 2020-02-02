<?php 
require "include/security.php";
$id = $_GET['id'];

//database connection
require_once "include/connection.php";

//sql to delete record using id
$sql = "DELETE from admin where id=$id";

//execute query
$connect->query($sql);

header('location:admin_register.php');
?>