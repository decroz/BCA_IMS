<?php

if(isset($_POST['submit']))
{
    $err=[];
    if (isset($_POST['entrance_voucher']) && !empty($_POST['entrance_voucher']) && is_numeric($_POST['entrance_voucher']))  {
    $entrance_voucher =  $_POST['entrance_voucher'];
  } else {
    $err['entrance_voucher']='Enter voucher no';  
  }
   $user =  $_POST['id'];
}
require "include/connection.php";
 $sql = "UPDATE voucher_no v 
 inner join entrance_form e on v.id=e.id
 inner join admission a on e.id=a.entrance_form_id 
 inner join users u on a.users_id=u.id
 SET v.entrance_voucher='$entrance_voucher'
  where u.id='$user' ";

$connect->query($sql);


?>
