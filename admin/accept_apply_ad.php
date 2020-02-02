<?php
require "include/security.php";
require "alert_message.php";
$email = $_GET['email'];
$name =$_GET['name'];

//database connection
require_once "include/connection.php";
echo $sql ="SELECT * from apply_admission a
inner join entrance_form e on a.entrance_form_id=e.id
 where email='$email'";
$result=$connect->query($sql);
$data =[];
if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
     array_push($data, $user);
   }
  }
  foreach($data as $index => $d){
    $a_id=$d['id'];
    $names=$d['student_fname'];
    $citizen=$d['citizenship_no'];
}
$created_by=2;
$created_at = date('Y-m-d H:i:s');
$password="$names"."$citizen";
require_once "include/connection.php";
$sql="INSERT into users (username,password,created_by,created_at)
values
('$email','$password','$created_by','$created_at')";
$connect->query($sql);
$user_id= $connect->insert_id;

require_once "include/connection.php";
$sql="Update admission set users_id='$user_id' where apply_admission_id='$a_id'";
$connect->query($sql);

require "phpmailer/apply_email_verification.php";
header('location:index.php');


?>