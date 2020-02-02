<?php	
session_start();

session_destroy();

setcookie('user_username',false,time()-1);

header("location:index.php");
?>

