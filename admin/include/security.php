<?php
session_start();
include('include/connection.php');
$role=$_SESSION['admin_role'];
if(!isset($_SESSION['admin_id']) )
{
    header('location: login.php');
}
?>